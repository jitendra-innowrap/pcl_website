<?php

class MailModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '-1');
		ini_set('memory_limit', '2048M');
	}

	public function sendVendorQuote($message, $vendor_list)
	{
		$res = '';
		foreach ($vendor_list as $vendor){
			$res = $this->sendMail('rama@innowrap.com',$vendor['email'],false,false,'Product Quotation',$message);
		}
		if ($res){
			return true;
		}else{
			return false;
		}
	}

	public function sendMail($from, $to,$bcc = false, $cc = false, $subject, $message, $file = false)
	{
		if (empty($from)){
			return false;
		}
		if (empty($to)){
			return false;
		}
		if (empty($subject)){
			return false;
		}
		if (empty($message)){
			return false;
		}
		$config = array(
			'priority' => '1',
			'protocol' => 'smtp',
			'smtp_crypto' => 'tls',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_port' => 587,
			'smtp_user' => '', // change it to yours
			'smtp_pass' => '', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE,
			'newline' => "\r\n"
		);
		$this->email->initialize($config);
		$this->email->from($from);
		$this->email->to("$to");
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
}
