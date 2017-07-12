<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{

     public function __construct()
    {
         parent::__construct();
         $this->load->helper('url');
		     $this->load->helper('html');
		     $this->load->helper('path');
		     $this->load->helper('form');
		     $this->load->helper('cookie');
    }

	public function index()
	{
		$this->load->view('frontend/profile1');
	}
  public function profile2()
	{
		$this->load->view('frontend/profile2');
	}
  public function profile3()
	{
		$this->load->view('frontend/profile3');
	}
  public function profile4()
	{
		$this->load->view('frontend/profile4');
	}
  public function profile5()
	{
		$this->load->view('frontend/profile5');
	}

}
