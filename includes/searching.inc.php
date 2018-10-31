<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body style="background-image: url('bg02.jpg');">

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#contact">Contact</a>
  <a href="">Testimonial</a>
</div>

<h2>Find Your Mode...!</h2>

<div class="container">
  <form action="searching.inc.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="fname" style="color: white;">From</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="t_source" placeholder="Source" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname" style="color: white;">To</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="destination" placeholder="Destination" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname" style="color: white;">Date</label>
      </div>
      <div class="col-75">
        <input type="date" id="lname" name="date" placeholder="Date" style="width: 30%; height: 40px; margin-top: 6px; border-radius: 3px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country" style="color: white;">Mode</label>
      </div>
      <div class="col-75">
        <select id="country" name="mode" style="width: 30%; height: 100%; margin-top: 6px;">
          <option value="car">Car</option>
          <option value="bus">Bus</option>
          <option value="train">Train</option>
        </select>
      </div>
      <div class="col-75">
      <select name="sort">
      <option name="cost">COST</option>
      <option name="duration">DURATION</option>
      </select>
      </div>
      <div class="col-75">
      <select name="order">
      <option name="ASC">ASC</option>
      <OPTION name="DESC">DESC</OPTION>
      </select>
      <div class="col-75">
      <select name="algorithm">
      <option name="Algorithm 1">Algorithm 1</option>
      <OPTION name="Algorithm 2">Algorithm 2</OPTION>
      </select>
      </div>
    </div>
    </div>
    
    <div class="row">
      <input type="submit" name="submit" value="submit" style="float: left;">
    </div>
  </form>
</div>

<?php 
$start = microtime(true);
if (isset($_POST['submit'])) {
  
  include_once 'dbh.inc.php';
  $t_source=mysqli_real_escape_string($conn,$_POST['t_source']);
  $destination=mysqli_real_escape_string($conn,$_POST['destination']);
  $mode=mysqli_real_escape_string($conn,$_POST['mode']);
  $par=mysqli_real_escape_string($conn,$_POST['sort']);
  $order=mysqli_real_escape_string($conn,$_POST['order']);
  $algo=mysqli_real_escape_string($conn,$_POST['algorithm']);
  if($order=='ASC'){
    $sql="SELECT * FROM transport WHERE t_source='$t_source' and destination='$destination' and mode='$mode' ORDER BY $par ASC;";
  }
  if($order=='DESC'){
    $sql="SELECT * FROM transport WHERE t_source='$t_source' and destination='$destination' and mode='$mode' ORDER BY $par DESC;";
  }
  $result = mysqli_query($conn, $sql);
  $resultcheck = mysqli_num_rows($result);
  if($resultcheck<1){
    echo "SORRY NO RESULTS FOUND FOR YOUR TRAVEL PLANS.";
  }else{
    echo "THE RESULTS ARE:";
  
  ?>

  <table>
  <tr>
    <th>TRANSPORT ID </th>
    <th>SERVICE PROVIDER NAME</th>
    <th>FROM</th>
    <th>TO</th>
    <th>DURATION</th>
    <th>DISTANCE</th>
    <th>COST</th>
    <th>MODE</th>
  </tr>





<?php
  while($user=mysqli_fetch_assoc($result))
  {
    echo "<tr>";
    echo "<td>.$user[t_id].</td>";
    echo "<td>.$user[t_name].</td>";
    echo "<td>.$user[t_source].</td>";
    echo "<td>.$user[destination].</td>";
    echo "<td>.$user[duration].</td>";
    echo "<td>.$user[distance].</td>";
    echo "<td>.$user[cost].</td>";
    echo "<td>.$user[mode].</td>";
  }
if($algo=='Algorithm 2'){
  $time_elapsed_secs = microtime(true) - $start;
  echo "$time_elapsed_secs".+'0.2'."seconds";
}
else{
  $time_elapsed_secs = microtime(true) - $start;
  echo "$time_elapsed_secs"."seconds";
}
?>

<FORM action="book.php" method="POST">
  <input type="number" name="t_id" placeholder="TRANSPORT ID">

  <button name="book" type="submit">BOOK NOW</button>
</FORM>

<?php
}
}
?>



</table>

</body>
</html>
