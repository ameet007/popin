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



	public function partner1()
	{
		$this->load->view('frontend/new-partner2');

	}
	public function partner2()
	{
		$this->load->view('frontend/new-partner3');

	}
	public function partner3()
	{
		$this->load->view('frontend/new-partner3');

	}
	public function partner4()
	{
		$this->load->view('frontend/new-partner4');

	}
	public function partner5()
	{
		$this->load->view('frontend/new-partner5');

	}
	public function partner6()
	{
		$this->load->view('frontend/new-partner6');

	}
	public function partner7()
	{
		$this->load->view('frontend/new-partner7');

	}
	public function partner8()
	{
		$this->load->view('frontend/new-partner8');

	}
	public function partner9()
	{
		$this->load->view('frontend/new-partner9');

	}
	public function partner10()
	{
		$this->load->view('frontend/new-partner10');

	}
	public function partner11()
	{
		$this->load->view('frontend/new-partner11');

	}
	public function partner12()
	{
		$this->load->view('frontend/new-partner12');

	}
	public function partner13()
	{
		$this->load->view('frontend/new-partner13');

	}
	public function partner14()
	{
		$this->load->view('frontend/new-partner14');

	}
	public function partner16()
	{
		$this->load->view('frontend/new-partner16');

	}
	public function partner17()
	{
		$this->load->view('frontend/new-partner17');

	}
	public function partner18()
	{
		$this->load->view('frontend/new-partner18');

	}
	public function partner19()
	{
		$this->load->view('frontend/new-partner19');

	}
	public function partner20()
	{
		$this->load->view('frontend/new-partner10');

	}
	public function partner21()
	{
		$this->load->view('frontend/new-partner21');

	}public function partner22()
	{
		$this->load->view('frontend/new-partner22');

	}
	public function partner23()
	{
		$this->load->view('frontend/new-partner23');

	}
	public function partner24()
	{
		$this->load->view('frontend/new-partner24');

	}
	public function partner25()
	{
		$this->load->view('frontend/new-partner25');

	}public function partner26()
	{
		$this->load->view('frontend/new-partner26');

	}public function partner27()
	{
		$this->load->view('frontend/new-partner27');

	}
	public function partner28()
	{
		$this->load->view('frontend/new-partner28');

	}public function partner29()
	{
		$this->load->view('frontend/new-partner29');

	}
	public function partner30()
	{
		$this->load->view('frontend/new-partner30');

	}public function partner31()
	{
		$this->load->view('frontend/new-partner31');

	}
	public function partner32()
	{
		$this->load->view('frontend/new-partner32');

	}
	public function partner33()
	{
		$this->load->view('frontend/new-partner33');

	}
	public function partner34()
	{
		$this->load->view('frontend/new-partner34');

	}
	public function partner35()
	{
		$this->load->view('frontend/new-partner35');

	}public function partner36()
	{
		$this->load->view('frontend/new-partner36');

	}public function partner37()
	{
		$this->load->view('frontend/new-partner37');

	}

}
