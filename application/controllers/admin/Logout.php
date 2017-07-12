<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller{
	
	public function __Construct() {
		parent::__Construct();
		//$this->load->library('session');
		}
	function index() {
		
		$this->load->model(ADMIN_DIR.'/adminLogin','adminLogin');
		$affected_rows = $this->adminLogin->sessionLogout($this->session->userdata('session_login_id'));
		if($affected_rows>0)
		{
			$this->session->unset_userdata('admin_id');
                        $this->session->unset_userdata('session_login_id');
			$this->session->set_flashdata('message_notification','You have been logged out successfully');
			$this->session->set_flashdata('class',A_SUC);
			redirect(ADMIN_DIR.'/login');
		}
		else
		{
			$this->session->set_flashdata('message_notification','Something went wrong, Please try again later');
			$this->session->set_flashdata('class',A_FAIL);
			redirect(ADMIN_DIR.'/');
		}
	}	
}
