<?php 

session_start();

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['password']);


	//error handlers
	if (empty($email) || empty($pwd)) {
		header("Location: ../login.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE email='$email';";
		$result = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($result);
		if ($resultcheck < 1) {
			header("Location: ../login.php?login=notmatch");
			exit();
			echo "INCORRECT EMAIL";
		}else{
			$row = mysqli_fetch_assoc($result);
				//de-hashing the password
				
				if($pwd == false){
					
					header("Location: ../login.php?pwderror");
					exit();

				} elseif ($pwd == true) {
				//log in the user here
				$_SESSION['u_id'] = $row['user_id'];
				$_SESSION['u_first'] = $row['username'];
				
				$_SESSION['u_email'] = $row['email'];
				
				header("Location: ../query.php");
				exit();

			}
		}
	}
}else{
	header("Location: ../login.php?login=error");
	exit();
}
 
?>
