 <?php
require_once "pdo.php";
$failure = false;
$comment = false;

if ( isset($_POST['back'] ) ) {
    header('Location: login.php');
    return;
}

if ( isset($_POST['username']) ) {
    
    if (strlen($_POST['username']) < 1) {
        $failure = "Username is required.";
    }
    else{

      
            $sql = "SELECT name FROM userinfo
            WHERE username = :un ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':un' => $_POST['username']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row === false) {
              $failure = "Unregistered User Name.";
              error_log("Unsuccess password change attempt.".$_POST['username']);
            }
            else {

                $sql = "SELECT * FROM userinfo
                          WHERE username = :un ";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(array(
                ':un' => $_POST['username']));
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                session_start();
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['username'] = $_POST['username'];

                header("Location: ../Home/mail.php?username=".urlencode($_POST['username']));
                error_log("Password changed successfully. ".$_POST['username']);
            }

            
}
}
?> 


<html>
<head>
  <title>Forgot Password</title>
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="demo4.css">
  <link rel = "icon" href = "../Images/quizZone.png" type = "image/x-icon"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>


  <div class="overlay">
  <form method="post">
   <!--   con = Container  for items in the form-->
   <div class="con">
   <header class="head-form">

    <button name="back" class="backs">Go Back</button>
  
      <h2>Forgot Password</h2>
      <p>Enter the registered user name</p>
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
           <i class="fa fa-mobile-phone" style="font-size: 24px;"></i>
         </span>
        <!--   user name Input-->
         <input class="form-input1" id="mm" type="text" placeholder="User Name" name="username" >
         
        

<!--        buttons -->
<!--      button LogIn -->

      <button class="btn submits sign-up" name="login"> Continue </button>
   </div>
  
<!--   End Conrainer  -->
  </div>
  
  <!-- End Form -->
</form>
</div>
<script src="../js/demo4.js"></script>
</body>
</html>