<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Adminmodel extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }


	function getLogin($username, $pass)
	{

		    $res = $this->db->select('*')->from('admin')->where(array('email'=>$username,'password'=>$pass ))->get()->row_array();
		    if($res['email'] == $username && $res['password'] == $pass && $res['status'] != 'Active')
			{
				return "deactive";
			}
			//else if($res->email != $email && $res->password != $pwd )
			else if($res['email'] != $username && $res['password'] != $pass && $res['status'] != 'Active')
			{
				return "false";
			}
			else
			{
         $res = $this->db->select('*')->from('admin')->where(array('email'=>$username,'password'=>$pass ))->get();
				 return $res->result();
				//return "true";
			}
	}



}
?>
