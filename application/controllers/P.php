<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P extends CI_Controller
{

     public function __construct()
    {
         parent::__construct();
		 $this->load->model(FRONT_DIR.'/FrontPage','page');
		 $this->load->model(FRONT_DIR.'/FrontUser','user');
    }

	public function index()
	{
	if($this->session->userdata('user_id')!='')
	{
		$header['userProfileInfo'] = $this->user->userProfileInfo();
	}
	$last = $this->uri->total_segments();
	$pageUrl = $this->uri->segment($last);
	$data['pageDetail'] = $this->page->getPageDetail($pageUrl);
	$header['module_heading'] = $data['pageDetail']->pageTitle;
	$header['metaKeyWords'] = $data['pageDetail']->metaKeywords;
	$header['metaDescription'] = $data['pageDetail']->metaDescription;
	$header['metaAuthor'] = $data['pageDetail']->metaAuthor;
	/*echo '<pre>';
	print_r($data['pageDetail']);
	exit;*/
	$this->load->view(FRONT_DIR.'/'.INC.'/user-header',$header);
    $this->load->view(FRONT_DIR.'/static_page/index',$data);
	$this->load->view(FRONT_DIR.'/'.INC.'/user-footer');
	}
	public function contact()
	{
		if($this->session->userdata('user_id')!='')
		{
			$header['userProfileInfo'] = $this->user->userProfileInfo();
		}
	$header['module_heading'] = 'Contact Us';
	
	/*echo '<pre>';
	print_r($data['pageDetail']);
	exit;*/
	$this->load->view(FRONT_DIR.'/'.INC.'/user-header',$header);
    $this->load->view(FRONT_DIR.'/static_page/contact');
	$this->load->view(FRONT_DIR.'/'.INC.'/user-footer');
	}
	public function faq()
	{
		if($this->session->userdata('user_id')!='')
		{
			$header['userProfileInfo'] = $this->user->userProfileInfo();
		}
	$header['module_heading'] = 'Contact Us';
	
	/*echo '<pre>';
	print_r($data['pageDetail']);
	exit;*/
	$this->load->view(FRONT_DIR.'/'.INC.'/user-header',$header);
    $this->load->view(FRONT_DIR.'/static_page/faq');
	$this->load->view(FRONT_DIR.'/'.INC.'/user-footer');
	}
 }
