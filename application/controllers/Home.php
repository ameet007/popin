<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(FRONT_DIR . '/FrontUser', 'user');
        $this->load->model(FRONT_DIR . '/FrontSpace', 'space');
        $this->load->helper('popin');
        $this->load->library('paypal_lib');
    }

    public function index() {
        if ($this->session->userdata('user_id') != '') {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
        } else {
            $data = array();
        }
        $data['industries'] = $this->space->getDropdownData('industry');
        $data['featuredSpaces'] = $this->space->getFeaturedSpaces();
//        echo $this->db->last_query();
//        print_array($data['featuredSpaces']);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
        $this->load->view(FRONT_DIR . '/home', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }
    
    public function workshops() {
        if ($this->session->userdata('user_id') != '') {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
        } else {
            $data = array();
        }
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
        $this->load->view(FRONT_DIR . '/workshops', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }

    public function spaces() {
        $currentUser = '';
        if ($this->session->userdata('user_id') != '') {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
            $currentUser = $this->session->userdata('user_id');
        } else {
            $data = array();
        }
        $filters = $this->input->post();
        //print_array($filters);
        $data['space_types'] = $this->space->getDropdownData('space_types');
        $data['listings'] = $this->space->getActiveListings($currentUser, $filters);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
        $this->load->view(FRONT_DIR . '/spaces', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }

    public function rooms($space_id = '') {
        if (empty($space_id)) {
            redirect("Listing/listing");
        }
        $this->load->helper('inflector');
        $currentUser = '';
        if ($this->session->userdata('user_id') != NULL) {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
            $currentUser = $this->session->userdata('user_id');
        }
        if (!empty($space_id)) {
            //$host_id = $this->session->userdata('user_id');
            $data['preview'] = $this->space->get_space_preview_data($space_id, $host_id = '');
            if (empty($data['preview']) || $data['preview']['host'] == $currentUser) {
                redirect('spaces');
            }
            $data['hostProfileInfo'] = $this->space->hostProfileInfo($data['preview']['host']);
            $data['wishlistMaster'] = $this->user->getWishLists($currentUser);
            $industry = $data['preview']['industryTypeId'];
            $establishment = $data['preview']['establishmentTypeId'];
            $data['amenities'] = $this->space->collectAmenities($industry, $establishment);
            $data['facilities'] = $this->space->getDropdownData('facilities');
            
            $host_id = $this->session->userdata('user_id');
            $filters = array(
                'spaces.id !=' => $space_id,
                'spaces.host !=' => $host_id,
                'spaces.industryType' => $industry,
                'spaces.establishmentType' => $establishment,
                'spaces.status' => 'Active'
            );
            
            $data['similarListings'] = $this->space->getSimilarListings($filters);
            //print_array($data['similarListings']);
        }
        $data['search_nav'] = 1;
        $data['space_id'] = $space_id;
        $data['space_types'] = $this->space->getDropdownData('space_types');
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
        $this->load->view(FRONT_DIR . '/booking_management/booking', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }

    function send_message_submit() {
        $spaceId = $this->input->post('space');
        $hostId = $this->input->post('host');
        $guestId = $this->session->userdata('user_id');
        $checkIn = $this->input->post('checkIn');
        $checkOut = $this->input->post('checkOut');
        $professionals = $this->input->post('professionals');
        $message = $this->input->post('message');

        $messageBody = "<b>Check In: </b>{$checkIn}<br/><b>Check Out: </b>{$checkOut}<br/><br/>";
        $messageBody .= "<b>Number of professionals: </b>{$professionals}<br/><br/>";
        $messageBody .= nl2br($message);

        $rawData = array(
            'space_id' => $spaceId,
            'sender' => $guestId,
            'receiver' => $hostId,
            'message' => $messageBody
        );
        $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();

        $response = $this->user->create_conversation($rawData);
        if ($response) {
            $result['success'] = TRUE;
            $result['message'] = 'Message sent successfully.';
        } else {
            $result['success'] = FALSE;
            $result['message'] = 'Message sending failed.';
        }
        echo json_encode($result);
        die();
    }

    function get_booking_info() {
        $rawData = $this->input->post();
        $spaceData = $this->db->select('minStay,minStayType,maxStay,maxStayType,base_price,currency,cleaningFee,daily_discount,weekly_discount')->get_where('spaces', array('id' => $rawData['space']))->row_array();

        // Start date
        $checkIn = strtotime($rawData['checkIn']);
        // End date
        $checkOut = strtotime($rawData['checkOut']);

        $date1 = date_create(date("Y-m-d", $checkIn));
        $date2 = date_create(date("Y-m-d", $checkOut));
        $diff = date_diff($date1, $date2);
        $days = $diff->format("%a");

        $currencySymbol = getCurrency_symbol($spaceData['currency']);
        $basePrice = $spaceData['base_price'];
        $totalBasePrice = 0;

        if ($days > 0) {
            $tooltip = '<table class="table" style="margin-bottom: 0px;">
                                <thead><th colspan="2">Base Price Breakdown</th></thead>
                                <tbody>';
            while ($checkIn < $checkOut) {
                $dayPrice = $basePrice * 12;
                if ($days > 0 && $days < 7 && $spaceData['daily_discount'] > 0) {
                    $dayPrice = $dayPrice - round($dayPrice * $spaceData['daily_discount'] / 100, 1);
                }
                $totalBasePrice += $dayPrice;
                $tooltip .= '<tr><td>' . date("d-m-Y", $checkIn) . '</td><td>' . $currencySymbol . $dayPrice . '</td></tr>';
                $checkIn = strtotime("+1 day", $checkIn);
            }

            $tooltip .= '<tr><th>Total Base Price</th><th>' . $currencySymbol . $totalBasePrice . '</th></tr>';
            $tooltip .= '</tbody>
                        </table>';
            $priceBreakDown = $currencySymbol . $basePrice . ' x ' . $days . ' ' . $spaceData['maxStayType'];
            $numberBooking = $days;
            $bookingType = "days";
//            if($days>=7 && $spaceData['weekly_discount']>0){
//                $loopCount = $days/7;
//                $dayPrice = $dayPrice - round($dayPrice * $spaceData['daily_discount'] / 100);
//            }
        } else {
            $tooltip = "";
            $numberBooking = $spaceData['minStay'];
            $bookingType = "hours";
            $totalBasePrice = $basePrice * $spaceData['minStay'];
            $priceBreakDown = $currencySymbol . $basePrice . ' x ' . $spaceData['minStay'] . ' ' . $spaceData['minStayType'];
        }

        $settings = getSingleRecord('settings', 'id', '1');
        $serviceCharges = 0;
        if ($settings->serviceFee > 0) {
            $serviceCharges = round($totalBasePrice * $settings->serviceFee / 100);
        }
        // Additional costs
        $additionalCosts = $serviceCharges;
        if ($spaceData['cleaningFee'] > 0) {
            $additionalCosts += $spaceData['cleaningFee'];
        }

        // Calculate Final price
        $finalAmount = $totalBasePrice + $additionalCosts;

        $response = '<tr>
                        <td>' . $priceBreakDown .
                ' <i class="fa fa-question-circle" data-toggle="tooltip" title=\'' . $tooltip . '\' data-html="true"></i></td>
                        <td align="right">' . $currencySymbol . $totalBasePrice . '</td>
                    </tr>';
        if ($days > 0 && $days < 7 && $spaceData['daily_discount'] > 0) {
            $response .= '<tr>
                        <td>Daily discount of ' . $spaceData['daily_discount'] . '% is applied.</td>
                        <td></td>
                    </tr>';
        }
        if ($spaceData['cleaningFee'] > 0) {
            $response .= '<tr>
                        <td>Cleaning fee <i class="fa fa-question-circle" data-toggle="tooltip" title=""></i></td>
                        <td align="right">' . $currencySymbol . $spaceData['cleaningFee'] . '</td>
                    </tr>';
        }
        $response .= '<tr>
                        <td>Service fee <i class="fa fa-question-circle" data-toggle="tooltip" title="This help us run our platform and offer services like 24/7 support on your trip."></i></td>
                        <td align="right">' . $currencySymbol . $serviceCharges . '</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td align="right"><strong>' . $currencySymbol . $finalAmount . '</strong></td>
                    </tr>
                    <input type="hidden" name="currency" value="' . $spaceData['currency'] . '"><input type="hidden" name="basePrice" value="' . $basePrice . '">'
                . '<input type="hidden" name="totalBasePrice" value="' . $totalBasePrice . '">'
                . '<input type="hidden" name="addtionalCosts" value="' . $additionalCosts . '"><input type="hidden" name="totalAmount" value="' . $finalAmount . '">'
                . '<input type="hidden" name="bookingType" value="' . $bookingType . '"><input type="hidden" name="numberBooking" value="' . $numberBooking . '">';
        echo $response;
        die();
    }

    public function request_to_book() {
        $rawData = $this->input->post();
        if (empty($rawData)) {
            redirect('spaces');
        }
        $userID = $this->session->userdata('user_id'); //current user id
        $data['booking'] = $rawData;
        $data['spaceInfo'] = $this->user->spaceInfo($rawData['space']);
        $data['spaceGallery'] = $this->user->getSpaceGallery($rawData['space']);
        $data['userInfo'] = $this->user->userInfo($userID);
        $data['hostInfo'] = $this->user->userInfo($data['spaceInfo']['host']);
        //print_array($data['spaceInfo'], TRUE);
        $this->load->view(FRONT_DIR . '/booking_management/booking_summary', $data);
    }

    public function book_space() {
        $userID = $this->session->userdata('user_id'); //current user id
        $rawData = $this->input->post();
        //print_array($rawData);
        $rawData['user'] = $userID;
        $rawData['checkIn'] = date("Y-m-d", strtotime($this->input->post('checkIn')));
        $rawData['checkOut'] = date("Y-m-d", strtotime($this->input->post('checkOut')));
        $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();
        $bookingId = $this->space->insertBooking($rawData);
        if (!empty($bookingId)) {
            $this->session->set_userdata("bookingId", $bookingId);
            $spaceId = $rawData['space'];
            $spaceData = $this->db->select('host,spaceTitle')->get_where('spaces', array('id' => $spaceId))->row_array();

            // Send message to the partner
            $checkIn = $this->input->post('checkIn');
            $checkOut = $this->input->post('checkOut');
            $professionals = $this->input->post('professionals');
            $message = $this->input->post('professionalNote');

            $messageBody = "<b>Check In: </b>{$checkIn}<br/><b>Check Out: </b>{$checkOut}<br/><br/>";
            $messageBody .= "<b>Number of professionals: </b>{$professionals}<br/><br/>";
            $messageBody .= nl2br($message);

            $rawData = array(
                'space_id' => $spaceId,
                'sender' => $userID,
                'receiver' => $spaceData['host'],
                'subject' => 'A new space rental request created.',
                'message' => $messageBody
            );
            $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
            $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
            $rawData['ipAddress'] = $this->input->ip_address();

            $this->user->create_conversation($rawData);

            //Set variables for paypal form
            $returnURL = site_url() . 'home/payment_success'; //payment success url
            $cancelURL = base_url() . 'home/payment_cancel'; //payment cancel url
            $notifyURL = base_url() . 'home/payment_ipn'; //ipn url

            $logo = 'http://www.neurons-it.in/Popin/uploads/site/thumb/logo.png';

            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $spaceData['spaceTitle']);
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_number', $bookingId);
            $this->paypal_lib->add_field('amount', $this->session->userdata('checkout_amount'));
            $this->paypal_lib->image($logo);
            //$this->paypal_lib->add_field('currency_code', $this->session->userdata('checkout_currency'));

            $this->paypal_lib->paypal_auto_form();
        } else {
            $data['title'] = "Booking Failed";
            $data['message'] = "Your booking for this listing is failed due to some error.";
            //pass the transaction data to view
            $this->load->view(FRONT_DIR . '/' . INC . '/user-header', $data);
            $this->load->view(FRONT_DIR . '/booking_status', $data);
            $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
        }
    }

    function payment_success() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = "";

        //get the transaction data
        $data['paypalInfo'] = $this->input->post();
        $data['title'] = "Payment Submitted";
        $data['message'] = "Thank you! Your payment is being processed, and we’ll let you know when it’s been received.";
        //pass the transaction data to view
        $this->load->view(FRONT_DIR . '/' . INC . '/user-header', $data);
        $this->load->view(FRONT_DIR . '/booking_management/booking_status', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
    }

    function payment_cancel() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = "";
        $bookingId = $this->session->userdata("bookingId");
        $this->db->where('id', $bookingId)->update('space_booking', array('paymentStatus' => 'Cancelled'));
        $this->session->unset_userdata("bookingId");
        $data['title'] = "Payment Cancelled";
        $data['message'] = "Your payment is cancelled successfully.";
        //pass the transaction data to view
        $this->load->view(FRONT_DIR . '/' . INC . '/user-header', $data);
        $this->load->view(FRONT_DIR . '/booking_management/booking_status', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
    }

    //insert transaction data
    public function insertTransaction($data = array()) {
        $insert = $this->db->insert('payments', $data);
        return $insert ? true : false;
    }

    function payment_ipn() {
        //paypal return transaction details array
        $paypalInfo = $this->input->post();

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);

        //check whether the payment is verified
        if (preg_match("/VERIFIED/i", $result)) {
            $data['user_id'] = $paypalInfo['custom'];
            $data['booking_id'] = $paypalInfo["item_number"];
            $data['txn_id'] = $paypalInfo["txn_id"];
            $data['payment_gross'] = $paypalInfo["mc_gross"];
            $data['currency_code'] = $paypalInfo["mc_currency"];
            $data['payer_email'] = $paypalInfo["payer_email"];
            $data['payment_status'] = $paypalInfo["payment_status"];
            $data['payment_date'] = $paypalInfo["payment_date"];
            //insert the transaction data into the database
            $response = $this->insertTransaction($data);
            if ($response) {
                $updateData = array(
                    'paymentStatus' => ucfirst($data['payment_status']),
                    'transactionId' => $data['txn_id'],
                    'paymentAccount' => $data['payer_email'],
                    'updatedDate' => time()
                );
                $this->db->where('id', $data['booking_id'])->update('space_booking', $updateData);
            }
        }
    }

    # Customer USer profile

    public function viewProfile($userID = '') {
        if (empty($userID)) {
            redirect(base_url());
        }
        if ($this->session->userdata('user_id') != '' && $this->session->userdata('user_id') == $userID) {
            $loginID = $this->session->userdata('user_id');
            $data['checkStatus'] = $this->user->checkContactList($userID, $loginID);
            $data['userProfileInfo'] = getSingleRecord('user', 'id', $userID);
            $data['customerID'] = $userID;
            $data['module_heading'] = 'My Profile';
            $data['checkProfile'] = " ";
            $data['spaceList'] = $this->user->getSpaceList($loginID);
        } else {
            $header['step_info'] = "";
            $data['userProfileInfo'] = getSingleRecord('user', 'id', $userID);
            if ($this->session->has_userdata('user_id')){
                $userAddressBook = getMultiRecord('address_book', 'userID', $this->session->userdata('user_id'));
                foreach ($userAddressBook as $address) {
                    $data['addressBook'][] = $address['addUserID']; 
                }
                //print_array($data['addressBook']);
            }
            $header['checkProfile'] = "profile";
            $loginID = $userID;
            $data['customerID'] = $userID;
            $data['module_heading'] = 'My Profile';
            $data['spaceList'] = $this->user->getSpaceList($loginID);
        }
        $data['userWishLists'] = $this->user->getWishLists($userID, 'everyone');
        if ($userID == $this->session->userdata('user_id')) {
            $this->load->view(FRONT_DIR . '/' . INC . '/user-header', $data);
            $this->load->view(FRONT_DIR . '/user/userProfile', $data);
            $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
        } else {
            $data['search_nav'] = 1;
            $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
            $this->load->view(FRONT_DIR . '/user/userProfile', $data);
            $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
        }
    }

    # add customer data from the databse

    public function addContact() {
        $data = $this->input->post();
        $userID = $this->session->userdata('user_id');
        $contact = array();
        $contact['userID'] = $userID;
        $contact['addUserID '] = $data['contactUserID'];
        $contact['status'] = 'Active';
        $contact['createdDate'] = time();
        $contact['updatedDate'] = time();
        $contact['ipAddress '] = $this->input->ip_address();
        $check = $this->user->addContactList($contact);
        if ($check > 0) {
            echo 1;
        } else {
            echo 2;
        }
    }

}
