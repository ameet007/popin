<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->view('frontend/new-partner37');
	}
	public function Account()
	{
		$this->load->view('frontend/account');
	}
}
