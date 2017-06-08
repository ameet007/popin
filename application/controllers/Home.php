<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

     public function __construct()
    {
         parent::__construct();
	
    }

	public function index()
	{

    $this->load->view('frontend/home');
	}
	public function spaces_view()
	{

    $this->load->view('frontend/spaces');
	}
	public function workshop_view()
	{

    $this->load->view('frontend/workshop');
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
