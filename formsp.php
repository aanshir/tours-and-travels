<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}



.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body style="background-image: url('bg02.jpg');">

<h2 style="color: white;">Find Your Mode...!</h2>

<div class="container" style="color: white;">
  <form action="includes/formsp.inc.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="lname">Transport ID</label>
      </div>
      <div class="col-75">
        <input type="text" id="f" name="t_id" placeholder="ID" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Transport Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="t_name" placeholder="Name" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Source</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="t_source" placeholder="Source" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Destination</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="destination" placeholder="Destination" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Duration (in hours)</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="duration" placeholder="Duration" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
       <div class="col-25">
        <label for="lname">Distance</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="distance" placeholder="Distance" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Cost</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="cost" placeholder="Cost" style="width: 30%; height: 100%; margin-top: 6px;">
      </div>

    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Mode</label>
      </div>
      <div class="col-75">
        <select id="country" name="mode" style="width: 30%; height: 100%; margin-top: 6px;">
          <option name="car">Car</option>
          <option name="bus">Bus</option>
          <option name="train">Train</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" name="submit" value="Submit" style="float: left;">
    </div>
  </form>
</div>

</body>
</html>
