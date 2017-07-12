<?php 
// Send email from the user
function sendMail($email,$subject,$message)
{
  $to      = $email;
  $subject = $subject;
  $txt     = $message;
  $headers = "From: Popin@Popin.com" . "\r\n";
  mail($to,$subject,$txt,$headers);
}
function getSingleRecord($table,$column,$condication){
    $tableRecord =& get_instance();
    $tableRecord->load->database();
    return $tableRecord->db->get_where($table,array($column=>$condication))->row();
}
function getMultiRecord($table,$column,$condication){
    $tableRecord =& get_instance();
    $tableRecord->load->database();
    return $tableRecord->db->get_where($table,array($column=>$condication))->result_array();
}
?>