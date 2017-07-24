<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(FRONT_DIR . '/FrontUser', 'user');
        $this->load->model(FRONT_DIR . '/FrontSpace', 'space');
        $this->load->helper('text');
    }

    public function index()
    {
    	$data['module_heading'] = 'Dashboard';
    	$data['userProfileInfo'] = $this->user->userProfileInfo();
        $rawdata['limit']   = 5;
        $rawdata['start']   = 0;
        $data['userMessages'] = $this->user->getUserMessages($data['userProfileInfo']->id, "new", $rawdata);
        $data['settings'] = getSingleRecord('settings','id','1');
    	$this->load->view('frontend/dashboard',$data);
    }

    public function inbox()
    {
        $data['module_heading'] = 'Inbox';
        $data['userProfileInfo'] = $this->user->userProfileInfo();

        $user_id = $this->session->userdata('user_id');
        $this->user->updateMessageStatus($user_id,'read');
        $status = $this->input->post('status');
        $rawdata['page']        = 1;
        $rawdata['limit']       = 10;
        if($rawdata['page']==1){
            $rawdata['start']   = 0;
        }else{
            $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
        }
        $data['userMessages']   = $modelData['data']  = $this->user->getUserMessages($user_id,$status,$rawdata);
        $modelData['page']  = $rawdata['page'];
        $modelData['limit'] = $rawdata['limit'];
        $data['messages']   = $this->messageBuilderHTML($modelData);
        $data['status']   = $status;
        $this->load->view('frontend/inbox',$data);
    }

    public function messageRequest(){
        if(isset($_POST)){
            $user_id = $this->session->userdata('user_id');
            $status = $this->input->post('status');
            $rawdata['page']        = $this->input->post('page');
            $rawdata['limit']       = 10;
            if($rawdata['page']==1){
                $rawdata['start']   = 0;
            }else{
                $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
            }
            $modelData['data']  = $this->user->getUserMessages($user_id,$status,$rawdata);
            $modelData['page']  = $rawdata['page'];
            $modelData['limit'] = $rawdata['limit'];
            $messasgeData = $this->messageBuilderHTML($modelData);
            echo $messasgeData;
        }
    }
    private function messageBuilderHTML($modelData){
        $HTML='';
        if(empty($modelData['data']['messages'])){

        }else{
            if(empty($modelData['data']['messages'])){
                $page = '0';
            }else{
                $page = $modelData['page']+1;
            }
            foreach($modelData['data']['messages'] as $messages){
                    $star = "fa-star-o";
                    if($messages['status'] == 'starred'):
                        $star = "fa-star";
                    endif;
                    $HTML.='<tr>
                        <td width="60"><center><!--<a href="javascript:;" class="update-msg-status" data-msg-id="'.$messages['id'].'" data-action="starred" data-status="'.$messages['status'].'"><i class="fa '. $star.'" aria-hidden="true"></i></a>&nbsp;&nbsp;--><img class="user-pic" src="'. base_url('uploads/user/thumb/'.$messages['userInfo']['picture']).'" alt="" width="50" height="50"></center></td>
                        <td width="80"><span class="dark-gery">'.$messages['userInfo']['fname'].' <br/>'. date("d/m/Y",$messages['createdDate']).'</span></td>
                        <td width="400">';
                            if(isset($messages['spaceInfo'])):$HTML.= $messages['spaceInfo']['title'].", ".$messages['spaceInfo']['country']." <br/>";endif;
                            if(!empty($messages['subject'])):$HTML.= $messages['subject']."<br/><br/>";endif;
                            $HTML.= nl2br($messages['message']);
                            if(!empty($messages['replies'])): foreach($messages['replies'] as $replies):$userInfo = $this->user->userInfo($replies['sender'],"firstName,lastName,avatar");
                            $HTML.='<blockquote>'.$replies['message'].'<span class="pull-right"> - '. $userInfo->firstName .'</span></blockquote>';
                            endforeach;endif;
                        $HTML.='</td>';
                        if($messages['booking']):
                        $HTML.='<td width="100">
                            <h4>Accepted</h4>
                            <span class="price">&amp;40</span>
                        </td>';
                        else:
                            $receiverId = ($this->session->userdata('user_id') == $messages['sender'])?$messages['receiver']:$messages['sender'];
                            $archived = $messages['status']=='archived'?'Archived':'Archive';
                        $HTML.='<td width="150" align="center">
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn-red" data-receiverId="'.$receiverId.'" data-receiverName="'.$messages['userInfo']['fname'].'"  data-parentId="'.$messages['id'].'" title="Reply"><i class="fa fa-reply"></i></button>
                            <!--<a href="javascript:;" class="btn2 update-msg-status" data-msg-id="'. $messages['id'].'" data-action="archived" data-status="'. $messages['status'].'" title="Archive">'.$archived.'</a>-->
                        </td>';
                        endif;
                    $HTML.='</tr>';
            }
            $HTML.="<input type='hidden' class='nextpage' value='".$page."'>";
        }
        return $HTML;
    }

    public function update_message_status(){
        $id = $this->input->post("msg_id");
        $action = $this->input->post("action");
        $status = $this->input->post("status");

        if($action == $status){
            $newStatus = "read";
        }else{
            $newStatus = $action;
        }
        $updateData = array('updatedDate' => time(), 'status' => $newStatus);
        $this->db->where('id', $id);
        $this->db->update('conversation', $updateData);
        if($this->db->affected_rows()){
            if($action == 'starred' && $newStatus == 'starred'){
                echo '<i class="fa fa-star" aria-hidden="true"></i>';
            }elseif($action == 'starred' && $newStatus == 'read'){
                echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
            }

            if($action == 'archived' && $newStatus == 'archived'){
                echo 'Archived';
            }elseif($action == 'archived' && $newStatus == 'read'){
                echo 'Archive';
            }
        }
    }

    function send_reply() {
        $sender = $this->session->userdata('user_id');
        $receiver = $this->input->post('receiver');
        $parent = $this->input->post('parent');
        $message = $this->input->post('message');

        $rawData = array(
            'sender'    => $sender,
            'receiver'  => $receiver,
            'parent'    => $parent,
            'message'   => $message
        );
        $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
        $rawData['ipAddress'] = $this->input->ip_address();

        $response = $this->user->create_conversation($rawData);
        if($response){
            $updateData = array('updatedDate' => time());
            $this->db->where('id', $parent);
            $this->db->update('conversation', $updateData);
            $result['success'] = TRUE;
            $result['message'] = 'Message sent successfully.';
        }else{
            $result['success'] = FALSE;
            $result['message'] = 'Message sending failed.';
        }
        echo json_encode($result);die();
    }
    public function compose($userId = '') {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $sender = $this->session->userdata('user_id');
            $receiver = $this->input->post('user_id');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
            if(empty($receiver)){
                $this->session->set_flashdata('message_notification', "Message receiver doesn't exists.");
                $this->session->set_flashdata('class', A_FAIL);
                redirect(site_url('compose'));
            }elseif(empty($subject)){
                $this->session->set_flashdata('message_notification', "Please enter message subject.");
                $this->session->set_flashdata('class', A_FAIL);
                redirect(site_url('compose'));
            }
            $rawData = array(
                'sender'    => $sender,
                'receiver'  => $receiver,
                'subject'    => $subject,
                'message'   => $message        
            );
            $rawData['createdDate'] = strtotime(date('Y-m-d H:i:s'));
            $rawData['updatedDate'] = strtotime(date('Y-m-d H:i:s'));
            $rawData['ipAddress'] = $this->input->ip_address();

            $response = $this->user->create_conversation($rawData);
            if($response){
                $this->session->set_flashdata('message_notification', 'Message sent successfully.');
                $this->session->set_flashdata('class', A_SUC);
            }else{
                $this->session->set_flashdata('message_notification', 'Message sending failed.');
                $this->session->set_flashdata('class', A_FAIL);
            }
            redirect(site_url('compose'));
        }
        if(!empty($userId)){
            $data['contactUser'] = $this->user->userInfo($userId, "id,firstName,lastName");
        }
        $data['module_heading'] = 'Compose Message';
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $this->load->view('frontend/compose',$data);
    }
    public function search_user()
    {
        //get search term
        $searchTerm = $this->input->get('term');
        $user = $this->session->userdata('user_id');
        //get matched data from newspaper table
        $data = $this->user->fetch_users($user, $searchTerm);

        //return json data
        echo $data;
        exit;
    }

    public function wishlists()
    {
        $userID = $this->session->userdata('user_id');
        $data['search_nav'] = 1;
    	$data['module_heading'] = 'Wishlists';
    	$data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['userWishLists'] = $this->user->getWishLists($userID);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
    	$this->load->view('frontend/wishlists',$data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }

    function create_wishlist() {

        $rawData = array(
            'user'    => $this->session->userdata('user_id'),
            'name'  => $this->input->post('name'),
            'privacy'  => $this->input->post('privacy'),
            'createdDate'    => time(),
            'updatedDate'   => time(),
            'ipAddress'   => $this->input->ip_address()
        );

        $wishlistID = $this->user->create_wishlist($rawData);
        if($wishlistID){
            $spaceID = $this->input->post('space');
            if(!empty($spaceID)){ $this->user->add_to_wishlist($wishlistID, $spaceID); }
            $result['success'] = TRUE;
            $result['message'] = 'Wish List created successfully.';
        }else{
            $result['success'] = FALSE;
            $result['message'] = 'Wish List creation failed.';
        }
        echo json_encode($result);die();
    }
    
    function add_to_wishlist() {

        $postData = $this->input->post();
        $isPresent = $this->user->check_wishlist_record($postData);
        if(!$isPresent){
            $this->user->add_to_wishlist($postData['wishlist_id'], $postData['space_id']);
            $result['success'] = 2;
            $result['addedInAny'] = $this->user->check_space_in_wishlist($postData['space_id']);
            $result['message'] = 'Added to wishlist successfully.';
        }else{
            $response = $this->user->update_wishlist($postData);
            $result['success'] = $response;
            $result['addedInAny'] = $this->user->check_space_in_wishlist($postData['space_id']);
            $result['message'] = 'Wishlist updated successfully.';
        }
        echo json_encode($result);die();
    }

    public function rentals()
    {
        $data['module_heading'] = 'Rentals';
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $userID = $this->session->userdata('user_id'); 
        $data['userRentals'] = $this->user->getUserRentals($userID);
        $this->load->view('frontend/your-rental',$data);
    }
    public function rental_receipt($id)
    {
        $data['search_nav'] = 1;
        $data['module_heading'] = 'Rentals Receipt';
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['bookingInfo'] = $this->user->bookingInfo($id);
        //print_array($data['bookingInfo']);
        if(empty($data['bookingInfo'])){
            redirect('rentals');
        }
        $data['spaceInfo'] = $this->user->spaceInfo($data['bookingInfo']['space']);
        $data['userInfo'] = $this->user->userInfo($data['bookingInfo']['user']);
        $data['hostInfo'] = $this->user->userInfo($data['spaceInfo']['host']);
        $this->load->view('frontend/your-rental2',$data);
    }
    # get add user list on the add book
    public function contactList(){
      $data['module_heading'] = 'Inbox';
      $data['userProfileInfo'] = $this->user->userProfileInfo();
      $user_id = $this->session->userdata('user_id');
      $rawdata['page']        = 1;
      $rawdata['limit']       = 10;
     if($rawdata['page']==1){
          $rawdata['start']   = 0;
      }else{
        $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
      }
     $data['userMessages']   = $modelData['data']  = $this->user->bookContactList($user_id,$rawdata);
     $modelData['page']      = $rawdata['page'];
     $modelData['limit']     = $rawdata['limit'];
     $data['messages']       = $this->conatctListHTML($modelData);
    //  echo '<pre>';
    //print_r($data);exit;
      // $data['status']   = $status;
      $this->load->view('frontend/contactList',$data);
    }
    # create html file view on the List
    public function conatctListHTML($modelData){
        $HTML='';
        if(empty($modelData['data']['messages'])){

        }else{
            if(empty($modelData['data']['messages'])){
                $page = '0';
            }else{
                $page = $modelData['page']+1;
            }
            // echo '<pre>';
            // print_r($modelData['data']['messages']);exit;
            foreach($modelData['data']['messages'] as $messages){
                   $getUserInfo  = getSingleRecord('user','id',$messages['addUserID']);
                   $avatar = ($getUserInfo->avatar != '' && file_exists('uploads/user/thumb/' . $getUserInfo->avatar)) ? $getUserInfo->avatar : 'user_pic-225x225.png';
              $HTML .='<li class="media">
                <a class="pull-left" href="#">
                  <img style="width: 125px;" class="media-object img-circle" src="'.base_url().'uploads/user/thumb/'.$avatar.'" alt="profile">
                </a>
                <div class="media-body">
                  <div class="well well-lg">
                      <h4 class="media-heading text-uppercase reviews">'.$getUserInfo->firstName.' '.$getUserInfo->lastName.'</h4>
                      <ul class="media-date text-uppercase reviews list-inline">
                        <li class="dd">'.date('M',$messages['createdDate']).'</li>
                        <li class="mm">'.date('d',$messages['createdDate']).'</li>
                        <li class="aaaa">'.date('Y',$messages['createdDate']).'</li>
                      </ul>
                      <p class="media-comment">
                        '.$getUserInfo->aboutYou.'
                      </p>
                      <a class="btn btn-info btn-circle text-uppercase" href="'. site_url('compose/'.$getUserInfo->id).'" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Send Message</a>
                      <!--<a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse">'.$messages['status'].'</a>-->
                  </div>
                </div>
              </li>';
            }
            $HTML.="<input type='hidden' class='nextpage' value='".$page."'>";
        }
        return $HTML;
    }
    public function contactRequest(){
        if(isset($_POST)){
            $user_id = $this->session->userdata('user_id');
            $rawdata['page']        = $this->input->post('page');
            $rawdata['limit']       = 10;
            if($rawdata['page']==1){
                $rawdata['start']   = 0;
            }else{
                $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
            }
            $modelData['data']  = $this->user->getUserMessages($user_id,$rawdata);
            $modelData['page']  = $rawdata['page'];
            $modelData['limit'] = $rawdata['limit'];
            $messasgeData = $this->messageBuilderHTML($modelData);
            echo $messasgeData;
        }
    }   
    public function invite(){
        getCurrency_symbol();
        $data['search_nav'] = 1;
    	$data['module_heading'] = 'Wishlists';
    	$data['userProfileInfo'] = $this->user->userProfileInfo();
        $referalLink = trim($data['userProfileInfo']->referalLink);
        if(empty($referalLink)){
            $rand = substr(uniqid('', true), -4);
            $name = explode(' ',$data['userProfileInfo']->firstName);
            $referral = strtolower(trim($name[0])). substr(strtolower(trim($data['userProfileInfo']->lastName)), 0, 1).$rand;
            $update['referalLink'] = $referral;
            $update['updatedDate'] = time();
            $this->user->editUser($update, $data['userProfileInfo']->id);
            $data['userProfileInfo']->referalLink = $referral;
        }
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
    	$this->load->view('frontend/invite',$data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }
  # referral registration page
    public function referral($referralNumber){
        $data['module_heading'] = 'Wishlists';
        if ($this->session->userdata('user_id') != '') {
            $data['userProfileInfo'] = $this->user->userProfileInfo();
        } else {
            $data = array();
        }
        $data['referralID']     = $referralNumber;
        $getUserInfo = getSingleRecord('user','referalLink',$referralNumber);
        if (!empty($getUserInfo)) {
             $alreadyJoin = $this->user->checkAlreadyJoinAccount($getUserInfo->id);
             if ($alreadyJoin == 'true') {
                 $this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $data);
                 $this->load->view('frontend/referral',$data);
                 $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer'); 
             }else{
            redirect(base_url());
             }
        }else{
            redirect(base_url());
        }
    }
    public function send_invitation(){
        $data = $this->input->post();
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $emailList = explode(",",$data['contacts']);
        $check = $this->user->sendInvitationMail($emailList,$data['link'],$data['userProfileInfo']);
        $this->session->set_flashdata('message_notification', 'Your invitation has ben sent Successfully');
            $this->session->set_flashdata('class', A_SUC);
       redirect(base_url('invite'));
    }
    # Create reivews
    public function reivews($bookingID,$spaceID){
        $data['module_heading']  = 'Reivews';
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $userID = $this->session->userdata('user_id'); 
         $data['bookingID']       = $bookingID;
         $data['spaceID']         = $spaceID;
         $data['checkStatus']     = $this->space->userReivewsStatus($userID,$bookingID,$spaceID);
         $data['reivewsList']     = $this->space->ratingList($spaceID);
        $this->load->view('frontend/reivews',$data);
    }
    public function RatingReviews(){
        $data   = $this->input->post();
        $userID = $this->session->userdata('user_id');
        $check  = $this->space->reviewsPost($userID,$data);
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        if ($check > 0) {
                 $this->space->totalReviewsRating($data['spaceID']);
            echo $this->space->preApendUserReviews($data['userProfileInfo'],$data);   
        }else{
           echo '2';
        }
    }
    public function viewAllListReviews(){
        $spaceID     = $this->input->post('spaceID');
        $reivewsList = $this->space->ratingList($spaceID);
        echo $this->space->lsitViewReviews($reivewsList);
    }
}
