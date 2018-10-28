<?php 
session_start();
 ?>

<?php 

if (isset($_POST['book'])) {
  
  include_once 'dbh.inc.php';

  $t_id=mysqli_real_escape_string($conn,$_POST['t_id']);


  $sql="SELECT * FROM transport WHERE t_id='$t_id';";
  $result=mysqli_query($conn,$sql);
  $resultcheck = mysqli_num_rows($result);

  if($resultcheck<1){
    echo "INVALID TRANSPORT ID. PLEASE ENTER IT AGAIN.";
  }else{
    echo "DETAILS:";

while($user=mysqli_fetch_assoc($result))
  {
?>

<p>TRANSPORT ID: <?php echo "$user[t_id]";?> 
	<BR>TRANSPORT NAME:<?php echo "$user[t_name]";?> 
	<BR>FROM: <?php echo "$user[t_source]";?> 
	<BR>TO: <?php echo "$user[destination]";?> 
	<BR> DURATION: <?php echo "$user[duration]";?> 
	<BR>DISTANCE COVERED: <?php echo "$user[distance]";?> 
	<BR>COST: <?php echo "$user[cost]";?> 
	<BR>MODE: <?php echo "$user[mode]";?> 
	<BR>
</p>
<p><b>TO CONFIRM YOUR BOOKING ENTER THE DETAILS:</b></p>
<form action="pay.php" method="POST">
	<input type="text" name="username" placeholder="USERNAME">
	<input type="tel" name="acc_no" placeholder="ACCOUNT NUMBER">
	<input type="password" name="cvv" placeholder="CVV">
	<button type="submit" name="pay">PAY NOW</button>
</form>



<?php 
}
}
}
 ?>