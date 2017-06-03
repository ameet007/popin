<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
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
		//$this->load->view('frontend/new-partner2');
    //$this->load->view('frontend/inbox-x');
    $this->load->view('frontend/home');
	}
  public function login()
  {
    $this->load->view('frontend/new-partner2');

  }
	public function BecomeAPartner()
	{
		$this->load->view('frontend/index');

	}
  public function Inbox()
	{
		$this->load->view('frontend/inbox-x');

	}
  public function Rental()
	{
		$this->load->view('frontend/your-rental');

	}
}
