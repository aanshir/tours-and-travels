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
  <form action="includes/searching.inc.php" method="POST">
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
      </div>
      <div class="col-75">
      <select name="algorithm">
      <option name="algo1">Algorithm 1</option>
      <OPTION name="algo2">Algorithm 2</OPTION>
      </select>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" name="submit" value="submit" style="float: left;">
    </div>
  </form>
</div>


</body>
</html>

