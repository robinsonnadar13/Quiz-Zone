<?php
error_reporting(0);
require_once "pdo.php";
session_start();
$rollno = $_SESSION['rollno'];


if ( isset($_POST['goback'] ) ) {
    // Redirect the browser to cancel
    header('Location: ../home.php');
    return;
}

if ( !isset($_SESSION['rollno'] ) ) {
    die("ACCESS DENIED");
}


          $sql = "SELECT * FROM signupdata WHERE rollno = $rollno";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':nm' => $_POST['name'],
            ':rn' => $_POST['rollno'],
            ':em' => $_POST['email'],
            ':wb' => $_POST['wallet_balance'],
            ':pw' => $_POST['password']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

          
  

?>

<!DOCTYPE html>
<html>
<head>
  <title>My Account</title>
  <link rel="stylesheet" type="text/css" href="demo4.css">
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel = "icon" href = "../Images/logo2.png" type = "image/x-icon"> 
</head>
<body>
    <div class="overlay">

   <form method="post">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <!--     Start  header Content  -->
   <header class="head-form">
      <h2>My Account</h2>
      <!--     A welcome message or an explanation of the login form -->
   </header>
   <!--     End  header Content  -->
   <br>

   <div class="field-set">
         <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }

         if ( $comment !== false ) {
             echo('<p style="color: green; text-align:centre;">'.htmlentities($comment)."</p>\n");
         }

         ?>
         
          <a>Name: </a>
          <?php
          echo'<a>';
          echo htmlentities($row['name'])."\n";
          echo'</a>';
          ?>
          <br>
          <br>


          <a>Roll no: </a>
          <?php
          echo'<a>';
          echo htmlentities($_SESSION["rollno"]);
          echo'</a>';
          ?>
          <br>
          <br>
          

          <a>Email: </a>
          <?php
          echo'<a>';
          echo htmlentities($row['email'])."\n";
          echo'</a>';
          ?>
          <br>
          <br>

          <a>Password: </a>
          <?php
          echo'<a type="password">';
          echo htmlentities($row['password'])."\n";
          echo'</a>';
          ?>
          <br>
          <br>

          <a>Wallet Balance: </a>
          <?php
          echo'<a type="wallet_balance">';
          echo'&#X20B9;';
          echo htmlentities($row['wallet_balance'])."\n";
          echo'</a>';
          ?>
          <br>
          <br>
      
     
        
</span>
     
      <br>
<!--        buttons -->
<!--      button LogIn -->
      <a href="./home.php"><button  class="goback">Back to Homepage</button></a>
   </div>
  
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
<script src="js/demo4.js"></script>
</body>
</html>

