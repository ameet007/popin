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

        $data['module_heading'] = 'My Listing';
        $this->load->view('frontend/listing', $data);
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
                $basePrice = (!empty($spaceData['base_price']))? getCurrency_symbol($spaceData['currency']). number_format($spaceData['base_price']):'';
                $HTML.='<div class="item col-sm-6 col-md-4 col-lg-4">
                    <div class="slide-main clearfix">
                        <div class="slide-contant">
                            <a href="'. site_url('Space/become-a-partner/'.$spaceData['id']).'">
                            <div class="img" style="background-image: url('. base_url('uploads/user/gallery/'.$spaceGallery['image']).');">
                            </div>
                            <div class="content">
                                <p><strong>'.$basePrice.' · '.$spaceData['spaceTitle'].' </strong></p>
                                <p><span>'. $spaceData['establishmentType'].'/'.$spaceData['spaceType'].' · </span> '. $spaceData['workSpaceCount']." workspaces".'</p>
                                <div class="review">
                                    <span><img src="'. base_url('theme/front/assests/img/reting-star-home.png').'" alt="" /></span>
                                    <span><img src="'. base_url('theme/front/assests/img/reting-star-home.png').'" alt="" /></span>
                                    <span><img src="'. base_url('theme/front/assests/img/reting-star-home.png').'" alt="" /></span>
                                    <span>1 review</span>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>';
            }
            $HTML.="<input type='hidden' class='nextpage' value='".$page."'>";
        }
        return $HTML;
    }

    public function Listing2() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = 'My Reservations';
        $this->load->view('frontend/listing2', $data);
    }

    public function Listing3() {
        $data['userProfileInfo'] = $this->user->userProfileInfo();
        $data['module_heading'] = 'Reservation Requirements';
        $this->load->view('frontend/listing3', $data);
    }

}
