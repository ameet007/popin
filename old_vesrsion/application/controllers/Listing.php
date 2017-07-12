<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller
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

	public function Listing()
	{
		$this->load->view('frontend/listing');

	}
  public function Listing2()
	{
		$this->load->view('frontend/listing2');

	}
  public function Listing3()
	{
		$this->load->view('frontend/listing3');

	}
}
