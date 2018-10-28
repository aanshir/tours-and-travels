<?php 

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	
	$t_id=mysqli_real_escape_string($conn,$_POST['t_id']);
	$t_name=mysqli_real_escape_string($conn,$_POST['t_name']);
	$t_source=mysqli_real_escape_string($conn,$_POST['t_source']);
	$destination=mysqli_real_escape_string($conn,$_POST['destination']);
	$duration=mysqli_real_escape_string($conn,$_POST['duration']);
	$distance=mysqli_real_escape_string($conn,$_POST['distance']);
	$cost=mysqli_real_escape_string($conn,$_POST['cost']);
	$mode=mysqli_real_escape_string($conn,$_POST['mode']);

	$sql="SELECT * FROM transport WHERE t_id='$t_id';";
	$result = mysqli_query($conn, $sql);
	$resultcheck = mysqli_num_rows($result);

	if($resultcheck>0){
		echo "PLEASE ENTER YOUR UNIQUE ID. THIS IS ALREADY TAKEN.";
	}else{
		$sql="INSERT INTO transport VALUES('$t_id','$t_name','$t_source','$destination','$duration','$distance','$cost','$mode');";
		mysqli_query($conn, $sql);
		header("Location: ../formsp.php?success");
		exit();
	}
}
else{
	header("Location: ../formsp.php?error");
}
?>