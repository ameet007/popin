<?php

class FrontPage extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$table = 'newsletter_subscriber';
	}    
	
	public function getPageDetail($url)
	{
		$this->db->select('*');
		$this->db->from('static_page');
		$this->db->where('url',$url);
		$query = $this->db->get();		
		return $query->row();
	}	
}
?>