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
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
        $this->load->view(FRONT_DIR . '/home', $data);
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
        //$this->session->set_userdata('space_filters', $filters);
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
        if($this->session->userdata('user_id')!= NULL)
        {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
            $currentUser = $this->session->userdata('user_id');
        }

        if (!empty($space_id)) {
            //$host_id = $this->session->userdata('user_id');
            $data['preview'] = $this->space->get_space_preview_data($space_id, $host_id='');
            if(empty($data['preview']) || $data['preview']['host'] == $currentUser){
                redirect('spaces');
            }
            $data['hostProfileInfo'] = $this->space->hostProfileInfo($data['preview']['host']);
            $data['wishlistMaster'] = $this->user->getWishLists($currentUser);
            $industry = $data['preview']['industryTypeId'];
            $establishment = $data['preview']['establishmentTypeId'];
            $data['amenities'] = $this->space->collectAmenities($industry, $establishment);
            //print_array($data['wishlistMaster']);
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
        if($response){
            $result['success'] = TRUE;
            $result['message'] = 'Message sent successfully.';
        }else{
            $result['success'] = FALSE;
            $result['message'] = 'Message sending failed.';
        }
        echo json_encode($result);die();
    }
    function get_booking_info() {
        $rawData = $this->input->post();
        $spaceData = $this->db->select('base_price,currency')->get_where('spaces', array('id'=>$rawData['space']))->row_array();

        // Start date
	$checkIn = strtotime($rawData['checkIn']);
	// End date
	$checkOut = strtotime($rawData['checkOut']);

        $date1=date_create(date("Y-m-d", $checkIn));
        $date2=date_create(date("Y-m-d", $checkOut));
        $diff=date_diff($date1,$date2);
        $nights = $diff->format("%a");

        $currentySymbol = getCurrency_symbol($spaceData['currency']);
        $basePrice = $spaceData['base_price'];
        $totalBasePrice = 0;

        $tooltip = '<table class="table" style="margin-bottom: 0px;">
                            <thead><th colspan="2">Base Price Breakdown</th></thead>
                            <tbody>';
                            while ($checkIn < $checkOut) {
                                $totalBasePrice += $basePrice;
                                $tooltip .= '<tr><td>'.date("d-m-Y", $checkIn).'</td><td>'.$currentySymbol.number_format($basePrice).'</td></tr>';
                                $checkIn = strtotime("+1 day", $checkIn);
                            }

                                $tooltip .= '<tr><th>Total Base Price</th><th>'.$currentySymbol.number_format($totalBasePrice).'</th></tr>';
                    $tooltip .= '</tbody>
                    </table>';
        //$tooltip="";
        $serviceCharges = round($totalBasePrice * 12 / 100);
        $finalAmount = $totalBasePrice + $serviceCharges;
        $this->session->set_userdata('checkout_amount', $finalAmount);
        $this->session->set_userdata('checkout_currency', $spaceData['currency']);
        $reponse = '<tr>
                        <td>'.$currentySymbol.number_format($basePrice).' x '.$nights.' nights
                            <i class="fa fa-question-circle" data-toggle="tooltip" title=\''.$tooltip.'\' data-html="true"></i></td>
                        <td>'.$currentySymbol.number_format($totalBasePrice).'</td>
                    </tr>
                    <tr>
                        <td>Service fee <i class="fa fa-question-circle" data-toggle="tooltip" title="This help us run our platform and offer services like 24/7 support on your trip."></i></td>
                        <td>'.$currentySymbol.number_format($serviceCharges).'</td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <th>'.$currentySymbol.number_format($finalAmount).'</th>
                    </tr>
                    <input type="hidden" name="amount" value="'.$basePrice.'"><input type="hidden" name="currency" value="'.$spaceData['currency'].'">'
                . '<input type="hidden" name="addtionalCosts" value="'.$serviceCharges.'"><input type="hidden" name="totalAmount" value="'.$finalAmount.'">'
                . '<input type="hidden" name="numberBooking" value="'.$nights.'">';
        echo $reponse;die();
    }
    
    public function request_to_book() {
        $rawData = $this->input->post();
        if(empty($rawData)){
            redirect('spaces');
        }
        //print_array($rawData, FALSE);
        $userID = $this->session->userdata('user_id'); //current user id
        $data['booking'] = $rawData;
        $data['spaceInfo'] = $this->user->spaceInfo($rawData['space']);
        $data['spaceGallery'] = $this->user->getSpaceGallery($rawData['space']);
        $data['userInfo'] = $this->user->userInfo($userID);
        $data['hostInfo'] = $this->user->userInfo($data['spaceInfo']['host']);
        $this->load->view(FRONT_DIR . '/booking_management/booking_summary', $data);
    }
    public function book_space(){
        $userID = $this->session->userdata('user_id'); //current user id
        $rawData = $this->input->post();
        //print_array($rawData);
        $rawData['user'] = $userID;
        $rawData['checkIn'] = date("Y-m-d", strtotime($this->input->post('checkIn')));
        $rawData['checkOut'] = date("Y-m-d", strtotime($this->input->post('checkOut')));
        $rawData['bookingType'] = 'Day';
        $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();
        $bookingId = $this->space->insertBooking($rawData);
        if(!empty($bookingId)){
            //Set variables for paypal form
            $returnURL = site_url().'home/payment_success'; //payment success url
            $cancelURL = base_url().'home/payment_cancel'; //payment cancel url
            $notifyURL = base_url().'home/payment_ipn'; //ipn url

            $logo = 'http://www.neurons-it.in/Popin/uploads/site/thumb/logo.png';
            $spaceId = $rawData['space'];
            $spaceData = $this->db->select('spaceTitle')->get_where('spaces', array('id'=>$spaceId))->row_array();

            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $spaceData['spaceTitle']);
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_number', $bookingId );
            $this->paypal_lib->add_field('amount',  $this->session->userdata('checkout_amount'));
            $this->paypal_lib->image($logo);
            //$this->paypal_lib->add_field('currency_code', $this->session->userdata('checkout_currency'));

            $this->paypal_lib->paypal_auto_form();
        }else{
            $data['title'] = "Booking Failed";
            $data['message'] = "Your booking for this listing is failed due to some error.";
            //pass the transaction data to view
            $this->load->view(FRONT_DIR . '/' . INC . '/user-header',$data);
            $this->load->view(FRONT_DIR . '/booking_status', $data);
            $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
        }
    }
    function payment_success(){
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = "";

        //get the transaction data
        $data['paypalInfo'] = $this->input->post();
        $data['title'] = "Payment Submitted";
        $data['message'] = "Thank you! Your payment is being processed, and we’ll let you know when it’s been received.";
        //pass the transaction data to view
        $this->load->view(FRONT_DIR . '/' . INC . '/user-header',$data);
        $this->load->view(FRONT_DIR . '/booking_management/booking_status', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
     }

     function payment_cancel(){
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = "";

        $data['title'] = "Payment Cancelled";
        $data['message'] = "Your payment is cancelled successfully.";
        //pass the transaction data to view
        $this->load->view(FRONT_DIR . '/' . INC . '/user-header',$data);
        $this->load->view(FRONT_DIR . '/booking_management/booking_status', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
     }

     //insert transaction data
    public function insertTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }

     function payment_ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();

        $data['user_id'] = $paypalInfo['custom'];
        $data['booking_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
        $data['payment_date']    = $paypalInfo["payment_date"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);

        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
            //insert the transaction data into the database
            $this->insertTransaction($data);
        }
    }
    public function about() {
        exit('hello');
    }
 # Customer USer profile
 public function viewProfile($userID = '') {
     if ($this->session->userdata('user_id') != '') {
         $data['userProfileInfo'] = $this->user->userProfileInfo();
         $loginID = $this->session->userdata('user_id');
         $data['checkStatus']    = $this->user->checkContactList($userID,$loginID);
         $data['customerID']     = $userID;
         $data['module_heading'] = 'My Profile';
         $data['checkProfile']    = " ";
         $data['spaceList']      = $this->user->getSpaceList($loginID);
         $this->load->view(FRONT_DIR . '/' . INC . '/user-header', $data);
         $this->load->view(FRONT_DIR . '/user/userProfile', $data);
         $this->load->view(FRONT_DIR . '/' . INC . '/user-footer');
     } else {
         $header['step_info'] = "";
         $data['userProfileInfo'] = getSingleRecord('user','id',$userID);
         $header['checkProfile']    = "profile";
         $loginID = $userID;
         $data['customerID']     = $userID;
         $data['module_heading'] = 'My Profile';
         $data['spaceList']      = $this->user->getSpaceList($loginID);
         // $this->load->view(FRONT_DIR . '/include-partner/header', $header);
         $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
         $this->load->view(FRONT_DIR . '/user/userProfile', $data);
         $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
     }  
 }
 # add customer data from the databse
 public function addContact(){
    $data    = $this->input->post();
    $userID  = $this->session->userdata('user_id');
    $contact = array();
    $contact['userIID']     = $userID;
    $contact['addUserID ']  = $data['contactUserID'];
    $contact['status']      = 'Active';
    $contact['createdDate'] = time();
    $contact['updatedDate'] = time();
    $contact['ipAddress ']  = $this->input->ip_address();
    $check = $this->user->addContactList($contact);
    if ($check > 0) {
        echo '1';
    }else{
       echo '2';
    }
 }
}
