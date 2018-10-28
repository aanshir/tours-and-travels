<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);


	//error handlers
	if (empty($email) || empty($pwd)) {
		header("Location: ../loginsp.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM service_provider WHERE email='$email';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1) {
			header("Location: ../loginsp.php?login=notmatch");
			exit();
			echo "INCORRECT EMAIL";
		}else{
			$row = mysqli_fetch_assoc($result);
				//de-hashing the password
				
				if($pwd == false){
					
					header("Location: ../loginsp.php?pwderror");
					exit();

				} elseif ($pwd == true) {
				//log in the user here
				$_SESSION['u_id'] = $row['sp_id'];
				$_SESSION['u_first'] = $row['username'];
				
				$_SESSION['u_email'] = $row['email'];
				
				echo "login successful";

			}
		}
	}
}else{
	header("Location: ../loginsp.php?login=error");
	exit();
}
 
?>
