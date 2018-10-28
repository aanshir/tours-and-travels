<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	
	$username=mysqli_real_escape_string($conn,$_POST['usernamesignup']);
	$email=mysqli_real_escape_string($conn,$_POST['emailsignup']);
	
	$pwd=mysqli_real_escape_string($conn,$_POST['passwordsignup']);
	$cpwd=mysqli_real_escape_string($conn,$_POST['passwordsignup_confirm']);

	//error handlers
	//check for empty fields
	if(empty($username) || empty($email)|| empty($pwd)){
		header("Location: ../signupsp.php?signup=empty");
		exit();
	}else{
		//check if input char are valid
		if ($pwd != $cpwd) {
			echo "PASSWORDS DO NOT MATCH.....PLEASE TRY AGAIN.";

		}else{
			//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signupsp.php?signup=email");
				exit();
			}else{
				$sql = "SELECT * FROM service_provider WHERE username='$username';";
				$result = mysqli_query($conn, $sql);
				$resultcheck = mysqli_num_rows($result);

				if($resultcheck > 0){
					echo "USERNAME ALREADY TAKEN....PLEASE TRY AGAIN";
				}else{
					//hashing the password
					
					//insert the user into the database
					$sql = "INSERT INTO service_provider (username, email, pwd) VALUES ('$username', '$email', '$pwd');";
					mysqli_query($conn, $sql);
					header("Location: ../loginsp.php");
					exit();
				}
			}
		}
	}
}else{
	header("Location: ../signupsp.php?signup=no");
	exit();
}

 ?>