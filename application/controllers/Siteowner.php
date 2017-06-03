<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteowner extends CI_Controller
 {

    public function __construct()
    {
         parent::__construct();
         $this->load->database();
         $this->load->helper('url');
		     $this->load->helper('html');
		     $this->load->helper('path');
		     $this->load->helper('form');
		     $this->load->helper('cookie');
        $this->load->model('Adminmodel');
    }

  	public function index()
  	{
  		$this->load->view('admin/index');
  	}
    public function AdminLogin()
  	{

  		$data = array();
  		if(isset($_POST['submit']))
  		{
  			if($this->input->post('username') == '' || $this->input->post('password') == '' )
  			{
  				$data['error'] = 'Login Credentials Are Required!';
  				$this->load->view('admin/index',$data);
  			}
  			else
  			{
  				$response = $this->Adminmodel->getLogin($this->input->post('username'),$this->input->post('password'));
  				//if($response == 'pass') redirect('user/dashboard');
  				//print_r($response); die();
  				//if(count($response)==1)
  				 if($response == "false")
  			     {
  					$data['error'] = 'Either Username or Password is Wrong!';
  					$this->load->view('admin/index',$data);
  				 }
  				 else if($response == "deactive")
  				 {
  					 $data['error'] = 'your account with us is suspended temporarily.';
  					$this->load->view('admin/index',$data);
  				 }
  				 else
  				 {
  					foreach($response as $val)
  					{
  							$data= array('USERID' =>$val->id,
  									'USERNAME' => $val->uname,
  									'USEREMAILID' => $val->email,
  									'FIRSTNAME' => $val->name,
  									'logged_in' => true
  									);
  							$this->session->set_userdata($data);
  					}

  					 redirect('Siteowner/dashboard');

  			     }
  			}
  		}
  		else
  		$this->load->view('admin/index',$data);

  	}

    public function dashboard()
    {
        $this->load->view('admin/index1');
    }
    public function Logout()
    {
         $this->session->sess_destroy();
  		   redirect('Siteowner/index');
    }

}
