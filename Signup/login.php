<?php
// error_reporting(0);
require_once "pdo.php";
$email = $_POST["email"];
$failure = false;
$comment = false;

if ( isset($_POST['signup'] ) ) {
   
    header('Location: signup.php');
    return;
}


if ( isset($_POST['forgotpa'] ) ) {

    header('Location: forgot.php');
    return;
}

if ( isset($_POST['username']) && isset($_POST['password']) ) {

    
    if( strlen($_POST['username']) < 1) {
        $failure = "Username is required.";
    }
    elseif ( strlen($_POST['password']) < 5 ) {
        $failure = "Use at least 6 characters for password.";
    } 
    else{



            $sql = "SELECT name FROM userinfo
            WHERE username = :un AND password = :pw";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':un' => $_POST['username'],
            ':pw' => $_POST['password']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row === false) {
              $failure = "Invalid login credentials.";
              error_log("Login unsuccess ".$_POST['username']);
            }
            else {
                $comment = "Login Successful";
                session_start();
                $_SESSION['username'] = $_POST['username'];
                header("Location: ../Home/index.php?username=".urlencode($_POST['username']));
                error_log("Login success ".$_POST['username']);
            }

            
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="demo4.css">
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel = "icon" href = "../Images/quizZone.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="overlay">

   <form method="post">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <header class="head-form">
      <h2>Log In</h2>
      <p>login here using your username and password</p>
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
     
      <!--   user name -->
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input" id="txt-input" type="text" placeholder="User Name" name="username" >
     
      <br>
     
           <!--   Password -->
     
      <span class="input-item">
      <i class="fa fa-key"></i>
      </span>
      <input class="form-input" type="password" placeholder="Password" id="pwd"  name="password">
     
<!--      Show/hide password  -->
     <span>
        <i class="fa fa-eye"  type="button" id="eye"></i>
     </span>
     
     
      <br>
<!--        buttons -->
<!--      button LogIn -->
      <button class="log-in" name="login"> Log In </button>
   </div>
  
<!--   other buttons -->
   <div class="other">
<!--      Forgot Password button-->
      <button class="btn submits frgt-pass" name="forgotpa">Forgot Password</button>
<!--     Sign Up button -->
      <button class="btn submits sign-up" name="signup">Sign Up 
      </button>
<!--      End Other the Division -->
   </div>
     
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
<script src="../js/demo4.js"></script>
</body>
</html>

