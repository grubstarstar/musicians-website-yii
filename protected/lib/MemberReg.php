<?php

require_once('PHPMailer/class.phpmailer.php');

class MemberReg
{
	public $ErrorMessage = null;
	public $params = array();
	public $member_id;
	
	public function __construct($mid, $params_array) {
		$this->member_id = $mid;
		$this->params = $params_array;
	}
	
	public function sendRegistrationEmail() {
				
		// generate key and save in database
		$regKey = MemberActivation::generateRegKey();
		$memberAct = new MemberActivation();
		$memberAct->regkey = $regKey;
		$memberAct->member_id = $this->member_id;
		$memberAct->variables($this->params);
		$memberAct->save();		
	
		// send the activation email
		try {
			$mail = new PHPMailer();

			$mail->IsSMTP();
			$mail->Host = "localhost";
			//$mail->SMTPDebug = 2;
			
			// SMTP auth
			$mail->SMTPAuth = false;
			$mail->Username = Yii::app()->params['smtpUsername'];
			$mail->Password = Yii::app()->params['smtpPassword'];

			// Sender
			$mail->From = Yii::app()->params['adminEmail'];
			$mail->FromName = Yii::app()->params['adminName'];
			$mail->Sender = Yii::app()->params['adminEmail'];
			//$mail->AddReplyTo("info@example.com", "Information");
			
			// Recipient
			$mail->AddAddress("userA@localhost.com", "User A");

			$mail->WordWrap = 50;                                 // set word wrap to 50 characters
			$mail->IsHTML(true);

			$mail->Subject = "Account Activation";
			$mail->Body    = sprintf('Click <a href="http://localhost%s">this link</a> to activate your account', Yii::app()->controller->createUrl('guest/activate', array('k'=>$regKey)));
			$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

			$mail->Send();
		
		} catch (phpmailerException $e) {
		  $this->ErrorMessage = $e->errorMessage();
		  return false;
		} catch (Exception $e) {
		  $this->ErrorMessage = $e->errorMessage();
		  return false;
		}
		return true;
	}
}

?>