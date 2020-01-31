<?php
include 'config.php';
if(isset($_POST["loginButton"])){
	$mail =  $_POST["mailAddress"];
	$pass = $_POST["pass"];
	$passsha256 = hash('sha256',$pass);
	if($mail && $pass){
    $sql="SELECT * FROM customer WHERE mailAddress='$mail' and password='$passsha256'";
    $sorgu=mysqli_query($db,$sql);
    $sonuc=mysqli_fetch_row($sorgu);
		if($sonuc){
			if($sonuc[7] == 1) {
				$message="Your account has been suspended.";
				header("Location:login.php?message=$message");

			}else{
				session_start();
				$_SESSION['mailAddress'] = $mail;
				$_SESSION['ID'] = $sonuc[0];
				header('Location:index.php');
			}

		}else{
			$message = "Wrong email address or password!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Refresh:0; url=login.php");
		}
	}
}
 ?>
