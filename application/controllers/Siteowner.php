<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siteowner extends CI_Controller {

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
		$this->load->view('admin/index');
	}
	public function dashboard()
	{
		$this->load->view('admin/index1');
	}
}
