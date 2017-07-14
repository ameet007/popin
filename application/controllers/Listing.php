<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','html','path','form','cookie'));
        $this->load->model(FRONT_DIR . '/FrontUser', 'user');
        $this->load->model(FRONT_DIR . '/FrontSpace', 'space_model');
    }

    public function Listing() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        
        //$host_id = $this->session->userdata('user_id');
        
        //$data['userSpaceData'] = $this->db->get_where('spaces', array('host' => $host_id))->result_array();
        //$spaceGallery = $this->db->select('image')->order_by('position', 'asc')->get_where('space_gallery', array('space' => $space_id))->result_array();

        $user_id = $this->session->userdata('user_id');
        $rawdata['user_id']    = $user_id;
        $rawdata['page']        = '1';
        $rawdata['limit']       = 9;
        if($rawdata['page']==1){
            $rawdata['start']   = 0;  
        }else{
            $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
        }
        $modelData['data']  = $this->space_model->get_user_listings($rawdata);
        $modelData['page']  = $rawdata['page'];
        $modelData['limit'] = $rawdata['limit'];
        $data['listings']   = $this->listingBuilderHTML($modelData);
        $data['inprogress']  = $this->space_model->get_user_listings_inprogress($rawdata);
        $data['module_heading'] = 'My Listing';
        $this->load->view('frontend/listing/listing', $data);
    }

    public function listingData(){
        if(isset($_POST)){
            if($this->input->post('user_id')){
                $user_id = $this->input->post('user_id');
            }else{
                $user_id = $this->session->userdata('user_id');
            }
            $rawdata['user_id']    = $user_id;
            $rawdata['page']        = $this->input->post('page');
            $rawdata['limit']       = 9;
            if($rawdata['page']==1){
                $rawdata['start']   = 0;  
            }else{
                $rawdata['start']   = ($rawdata['page']-1)*$rawdata['limit'];
            }
            $modelData['data']  = $this->space_model->get_user_listings($rawdata);
            $modelData['page']  = $rawdata['page'];
            $modelData['limit'] = $rawdata['limit'];
            $messasgeData = $this->listingBuilderHTML($modelData);
            echo $messasgeData;
        }
    }

    private function listingBuilderHTML($modelData){
        $HTML='';
        if(count($modelData['data'])==0){
            /*if($modelData['page']==1):
                $HTML.='<section class="msg-box">                    
                            <div class="col-md-12">
                                <h5 class="text-center">'.lang('msg-no-msg').'</h5>
                            </div>
                        </section>';
            else:
                $HTML.='<section class="msg-box">                    
                        <div class="col-md-12">
                            <h5 class="text-center">'.lang('msg-no-more-msg').'</h5>
                        </div>
                    </section>';
            endif;
            $HTML.="<input type='hidden' class='nextpage' value='0'>";   */ 
        }else{
            if(count($modelData['data'])!=$modelData['limit']){
                $page = '0';
            }else{
                $page = $modelData['page']+1;
            }
            foreach($modelData['data'] as $spaceData){
                $establishmentType = $this->space_model->getDropdownDataRow('establishment_types', $spaceData['establishmentType']);
                if(!empty($establishmentType)){
                    $spaceData['establishmentType'] = $establishmentType['name'];
                }
                $spaceType = $this->space_model->getDropdownDataRow('space_types', $spaceData['spaceType']);
                if(!empty($spaceType)){
                    $spaceData['spaceType'] = $spaceType['name'];
                }
                $spaceGallery = $this->db->select('image')->order_by('position', 'asc')->limit('1')->get_where('space_gallery', array('space' => $spaceData['id']))->row_array();
                //$basePrice = (!empty($spaceData['base_price']))? getCurrency_symbol($spaceData['currency']). number_format($spaceData['base_price']):'';
                
                $HTML.='<div class="media">
                            <div class="media-left">
                                <div class="inner">
                                    <img src="'. base_url('uploads/user/gallery/'.$spaceGallery['image']).'" alt="" />
                                </div>
                            </div>
                            <div class="media-body media-middle">
                                <h4>'.$spaceData['spaceType'].' in '.$spaceData['city'].', '.$spaceData['state'].'</h4>
                                <p>Last updated on '.date("F d, Y",$spaceData['updatedDate']).'</p>
                                <div class="three-btn">
                                    <a href="'. site_url('manage-listing/'.$spaceData['id']).'" class="btn2">Manage listing</a>
                                    <a href="" class="green-btn">Calender</a>
                                    <a href="'. site_url('preview-listing/'.$spaceData['id']).'"><button class="btn">Preview</button></a>
                                </div>
                            </div>
                        </div>';
            }
            $HTML.="<input type='hidden' class='nextpage' value='".$page."'>";
        }
        return $HTML;
    }
    
    public function preview_listing($space_id = '') {
        if (empty($space_id)) {
            redirect("Listing/listing");
        }
        $this->load->helper('inflector');
        $header['userProfileInfo'] = $data['userProfileInfo'] = $this->user->userProfileInfo();
        

        if (!empty($space_id)) {
            $host_id = $this->session->userdata('user_id');
            $data['preview'] = $this->space_model->get_space_preview_data($space_id, $host_id);
            if(empty($data['preview'])){
                redirect('listing');
            }
            $data['hostProfileInfo'] = $this->space_model->hostProfileInfo($data['preview']['host']);
        }
        //echo "<pre>"; print_r($data); echo "</pre>";exit;
        $data['establishment_types'] = $this->space_model->getDropdownData('establishment_types');
        $data['space_types'] = $this->space_model->getDropdownData('space_types');
        $header['search_nav'] = 1;
        //$this->load->view(FRONT_DIR . '/' . INC . '/homepage-header', $header);
        $this->load->view(FRONT_DIR . '/include-partner/preview-header');
        $this->load->view(FRONT_DIR . '/listing/preview-listing', $data);
        $this->load->view(FRONT_DIR . '/' . INC . '/homepage-footer');
    }
    
    public function manage_listing($space_id = '') {
        if (empty($space_id)) {
            redirect("Listing/listing");
        }
        $this->load->helper('inflector');
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        if (!empty($space_id)) {
            $host_id = $this->session->userdata('user_id');
            $data['listing'] = $this->space_model->get_space_preview_data($space_id, $host_id);
            if(empty($data['listing'])){
                redirect('listing');
            }
            $data['space_types'] = $this->space_model->getDropdownData('space_types');
        }
//        echo "<pre>";
//        print_r($data['listing']);
//        echo "</pre>";
        $data['module_heading'] = "Manage Listing";
        $this->load->view(FRONT_DIR . '/listing/manage-listing', $data);
    }

    public function Listing2() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = 'My Reservations';
        $this->load->view('frontend/listing/listing2', $data);
    }

    public function Listing3() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = 'Reservation Requirements';
        $this->load->view('frontend/listing/listing3', $data);
    }

}
