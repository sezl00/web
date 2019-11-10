<?php
	if($_POST['email']=='' || !(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
		echo 'ko';
	}elseif($_POST['name']==''){
		echo 'ko';	
	}elseif($_POST['message']==''){
		echo 'ko';	
	}else{
		$subject = "=?utf-8?B?".base64_encode("Kontaktní formulář.")."?=";

		$txt = 	"Jmeno: ".$_POST['name'].
				"\n\nE-mail: ".$_POST['email'].
				"\n\nPožadavek: ".$_POST['option'].				"\n\nZpráva: ".$_POST['message']."\n\n";

		//$headers = "From: ".$_POST['email'];
		$headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\n";
        $headers .= "From: =?UTF-8?B?".base64_encode($_POST['name'])."?=<".$_POST['email'].">\n";
		
        if(mail ("kukyno21@gmail.com", $subject, $txt, $headers)){
			echo 'ok';
		}else{
			echo 'ko';	
		}
	}
?>