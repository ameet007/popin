<?php

class FrontEmails extends CI_Model {
	
	function __construct(){
		parent::__construct();
		$table = 'emails';
	}    
	
	
	
	public function getEmailTemplate($emailType)
	{
		$this->db->select('subject,content');
		$this->db->from('emails');
		$this->db->where('emailType',$emailType);
		$this->db->where('status','Active');
		$query = $this->db->get();		
		return $query->row();
	}
	
	public function emailDetails()
	{
		$this->db->select('siteName,fromEmail,replyEmail,emailSignature');
		$this->db->from('settings');
		$query = $this->db->get();		
		return $query->row();
	}
	
	public function sendEmail($subject,$content,$param,$to,$from,$reply)
	{
				$config = array (
							'mailtype' => 'html',
							'charset'  => 'utf-8',
							'priority' => '1'
						 );
				$this->email->initialize($config);
				foreach($param as $varName=>$varValue)
				{
					$content = str_replace($varName,$varValue,$content);
				}	
				/*echo '<pre>';
				print_r($from);
				print_r($to);
				exit($content);*/
				$this->email->from($from['email'],$from['name']);
				$this->email->to($to['email']);			
				/*$this->email->from('vanak@neurons-it.in', 'Aliasgar Vanak');
				$this->email->to('aliasgar.vanak@gmail.com','Ali');*/
				
				$this->email->subject($subject);
				$this->email->message($content);

				if($this->email->send())
				{
					// It means email sent..
					return true;
				}
				else
				{
					//Email is not sent..
					return false;
				}
	}
	
}
?>