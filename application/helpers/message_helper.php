<?php 
// Send email from the user
function sendMail($email,$subject,$smsmessage)
{
    $to       = $email;
    $message  ="&nbsp;".$smsmessage."\r\n";
    $message .="Note - This is a System Generated Mail, please do not reply.\r\n";
    $headers  = "From:"."Popin@Popin.com"."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    mail($to,$subject,'<pre style="font-size:14px;">'.$message.'</pre>',$headers);
    return 1;
}
function sendMailAdmin($email,$subjectTitle,$smsmessage,$from)
{
    $to       = $email;
    $subject  = $subjectTitle;
    $message  = $smsmessage."\r\n";
    $message .="Note - This is a System Generated Mail, please do not reply.\r\n";
    $headers  = "From:".$from."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    //echo $message;
    mail($to,$subject,'<pre style="font-size:14px;">'.$message.'</pre>',$headers);
    return 1;
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