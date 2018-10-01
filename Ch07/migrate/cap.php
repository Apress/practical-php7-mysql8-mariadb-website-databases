<?php
        if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
			$secretKey = "Put your secret key here";
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip_address);
			$keys = json_decode($response,true);
			if(intval($keys["success"]) !== 1) {
				echo "<h4 class='text-center'>Are you human? Click recaptcha</h4>";
				header( "refresh:1;" );
			}
		}
		else { echo "<h4 class='text-center'>Are you human? Click recaptcha!</h4>";
		header( "refresh:1;" );
		}
		
?>	