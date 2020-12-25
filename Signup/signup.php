<?php
require_once "pdo.php";
// error_reporting(0);
$failure = false; 
$comment = false;

if ( isset($_POST['cancel'] ) ) {
    
    header('Location: ../index.php');
    return;
}

if ( isset($_POST['login'] ) ) {
    header('Location: login.php');
    return;
}

try {

    if ( isset($_POST['name']) && isset($_POST['mobilenumber']) && isset($_POST['username']) 
      && isset($_POST['email']) && isset($_POST['password'])) {


    if ( strlen($_POST['name']) < 1 )  {
        $failure = "Name is required";
    } 
    elseif (preg_match('~[0-9]~', $_POST['name'])){
        $failure = "Name should not contain any numeric value.";
    }
    elseif ( !is_numeric($_POST['mobilenumber']) ) {
        $failure = "Mobile Number should be numeric";
    }
    elseif ( strlen($_POST['username']) < 1 ) {
        $failure = "User Name is required";
    } 
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {      
        $failure = "Invalid Email.";
    }
    
    elseif ( strlen($_POST['password']) < 5 ) {
        $failure = "Use at least 6 characters for password.";
    } 
    else{


          $sql = "INSERT INTO userinfo (name , mobilenumber, username, email, password)
          VALUES (:name, :mobilenumber, :username, :email, :password)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
          ':name' => $_POST['name'],
          ':mobilenumber' => $_POST['mobilenumber'],
          ':username' => $_POST['username'],
          ':email' => $_POST['email'],
          ':password' => $_POST['password']));
          $comment = "Successfully registered.Please Log In.";  
        
    }

  }
}
catch (\PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        $failure = "Phone Number or User Name already registered.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="demo4.css">
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel = "icon" href = "../Images/quizZone.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="overlay">

   <form method="post">

   <div class="con">
   
   <header class="head-form">
      <h2>Sign Up</h2>
   </header>
   
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
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
         <input class="form-input" id="txt-input1" name ="name" type="text" placeholder="Name" >
         <br>

          <span class="input-item">
          <i class="fa fa-mobile-phone" style="font-size: 24px;"></i>
          </span>
          <input class="form-input" id="txt-input1" name = "mobilenumber" type="number" placeholder="Mobile Number">
          <br>

          <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
         <input class="form-input" id="txt-input3" name ="username" type="text" placeholder="User Name" >
         <br>

          <span class="input-item">
          <i class="fa fa-at"></i>
          </span>
          <input class="form-input" id="txt-input4" name ="email" type="text" placeholder="Email">
          <br>
     
          <span class="input-item">
          <i class="fa fa-key"></i>
          </span>
          <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password">
          <span >
          <i class="fa fa-eye" type="button" id="eye"></i>
          </span>
          <br>



     </span>
      <br>

      <button class="signup"> Sign Up </button>
   </div>
  

   <div class="other">
      <button class="btn submits frgt-pass" name="cancel">Cancel</button>
      <button class="btn submits sign-up" name="login">Login 
      </button>

   </div>
  </div>
  
 
</form>
</div>
<script src="../js/demo4.js"></script>
</body>
</html>

