<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

     public function __construct()
    {
         parent::__construct();
         $this->load->helper('url');
		     $this->load->helper('html');
		     $this->load->helper('path');
		     $this->load->helper('form');
		     $this->load->helper('cookie');
			 echo "test";
    }

	public function Account()
	{
		$this->load->view('frontend/account');
	}
  public function Account2()
	{
		$this->load->view('frontend/account2');
	}
  public function Account3()
	{
		$this->load->view('frontend/account3');
	}
  public function Account4()
	{
		$this->load->view('frontend/account4');
	}
  public function Account5()
	{
		$this->load->view('frontend/account5');
	}
  public function Account6()
	{
		$this->load->view('frontend/account6');
	}
  public function Account7()
	{
		$this->load->view('frontend/account7');
	}
  public function Account8()
	{
		$this->load->view('frontend/account8');
	}
  public function Account9()
	{
		$this->load->view('frontend/account9');
	}
}
