<?php 
session_start();
 ?>

<?php 

if (isset($_POST['pay'])) {
  
  include_once 'dbh.inc.php';

  $username=mysqli_real_escape_string($conn,$_POST['username']);
  $acc_no=mysqli_real_escape_string($conn,$_POST['acc_no']);
  $cvv=mysqli_real_escape_string($conn,$_POST['cvv']);


    $sql = "SELECT * FROM bank a,users b WHERE b.username='$username';";
    
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck < 1) {
      echo "NO SUCH USER EXISTS. PLEASE TRY AGAIN";
      
    }else{
      $row = mysqli_fetch_assoc($result);
        //de-hashing the password
        
        if($acc_no == false){
          
          echo "INVALID ACCOUNT NUMBER";

        } else{
          if ($cvv == false) {
            echo "INVALID CVV";
          }else{
              $sql="INSERT INTO sp_details (username) values('$username');";
              echo "BOOKING CONFIRMED.";
              

          }
        }
      }
    }