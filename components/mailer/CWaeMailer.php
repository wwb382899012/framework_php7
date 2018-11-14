<?php 

error_reporting(E_ERROR);
require("class.phpmailer.php"); 

class CWaeMailer extends CApplicationComponent
{
		
		public $smtp_host = "smtp.exmail.qq.com" ;
		public $smtp_authorized =  true ;
		public $smtp_username =  "system@jyblife.com" ;
		public $smtp_password = "Mail123!";
		public $smtp_port = 465 ;
		public $SMTP_Secure = 'ssl';

		public $charset = 'utf-8';
		public $from = "system@jyblife.com";
		public $from_name = "system";

		public function init(){
			parent::init();
		}

		function send($toArray, $subject, $msg, $attachArray=array(), $fromArray=array())
		{
			return $this->sendReport($toArray, $subject, $msg, $attachArray, $fromArray);
		}

		function simple_send($tos, $subject, $msg, $from='')
		{
			$toarray = array();
			foreach ($tos as $v) {
				$toarray[] =  array('address'=>$v, 'name'=>$v);
	 		}
	 		$formarray = array(); 
	 		if(!empty($from))
	 		{
	 			$formarray['from'] = $from;
	 			$formarray['from_name'] = $from;
	 		}
	 		return $this->send($toarray, $subject, $msg ,$formarray);

		}
		
		function sendReport($toArray, $subject, $msg, $attachArray, $fromArray=array())
		{
				$mail = new PHPMailer(); 
				$mail->IsSMTP(); 
				$mail->Host = $this->smtp_host ;  
				$mail->SMTPAuth =$this->smtp_authorized ; 
				$mail->Username = $this->smtp_username ; 
				$mail->Password = $this->smtp_password ; 
				$mail->Port=$this->smtp_port ; 
				$mail->CharSet=$this->charset ;
				$mail->SMTPSecure = $this->SMTP_Secure;
				if(!empty($fromArray))
				{
					$mail->From = $fromArray['from']; 
					$mail->FromName = $fromArray['from_name'] ; 
				}else{
					$mail->From = $this->from ; 
					$mail->FromName = $this->from_name ; 
				}
				

				$mail->IsHTML(true); // set email format to HTML
				foreach ($attachArray as $attach){
						if (is_file($attach)){
							$mail->AddAttachment($attach);
						}
				}

				foreach($toArray as $to)
						$mail->AddAddress($to["address"], $to["name"]);
				$mail->Subject = $subject;
				$mail->Body = $msg;
				 
				if(!$mail->Send())
				{
					return false;
				}
				 
				return true ;
		}
}
