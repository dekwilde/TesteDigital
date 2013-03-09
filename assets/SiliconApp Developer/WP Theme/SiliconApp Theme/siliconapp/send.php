<?php 
if(isset($_POST['Send'])){
	
		$errorC = false;
	
		$the_name = $_POST['yourname'];
		$the_email = $_POST['email'];
		$the_message = $_POST['message'];
		
		# want to add aditional fields? just add them to the form in template_contact.php,
		# you dont have to edit this file
		
		//added fields that are not set explicit like the once above are combined and added before the actual message
		$already_used = array('yourname','email','message','ajax','myemail','myblogname','Send');
		$attach = '';
		
		foreach ($_POST as $key => $field)
		{
			if(!in_array($key,$already_used))
			{
				$attach.= $key.": ".$field."<br /> \n";
			}
		}
		$attach.= "<br /> \n";
		
		
		if(!checkmymail($the_email))
		{
			$errorC = true;
			$the_emailclass = "error";
		}else{
			$the_emailclass = "valid";
			}
		
		if($the_name == "")
		{
			$errorC = true;
			$the_nameclass = "error";
		}else{
			$the_nameclass = "valid";
			}
		
		if($the_message == "")
		{
			$errorC = true;
			$the_messageclass = "error";
		}else{
			$the_messageclass = "valid";
			}
		
		if($errorC == false)
		{	
			$to      =  $_POST['myemail'];
			$subject = "New Message from " . $_POST['myblogname'];
			$header  = 'MIME-Version: 1.0' . "\r\n";
			$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$header .= 'From:'. $_POST['email']  . " \r\n";
		
			$message1 = nl2br($_POST['message']);
			
			
			$message = "New message from  $the_name <br/>
			Mail: $the_email<br />
			$attach <br />
			Message: $message1 <br />";
			
			if(@mail($to,$subject,$message,$header)) $send = true; else $send = false;
			
			if(isset($_POST['ajax'])){
				
			if (!$send)
			echo '<br /><h2 style="width:100%;">Your message has been sent!</h2><div class="confirm">
					<p class="textconfirm">Thank you for contacting us.<br/>We will get back to you within 2 business days.</p>
				  </div>';
			else
			echo '<br /><h2 style="width:100%;">Oops!</h2><div class="confirm">
					<p class="texterror">Due to an unknown error, your form was not submitted, please resubmit it or try later.</p>
				  </div>'; 
				
			}
		
		}
		
}
	
	
function checkmymail($mailadresse){
	$email_flag=preg_match("!^\w[\w|\.|\-]+@\w[\w|\.|\-]+\.[a-zA-Z]{2,4}$!",$mailadresse);
	return $email_flag;
}
	




?>