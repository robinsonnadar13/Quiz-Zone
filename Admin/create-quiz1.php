<?php
require_once "../Signup/pdo.php";
session_start();
$username = $_SESSION['username'];
$failure = false; 
$comment = false;

if ( isset($_POST['quiznamecheck'] ) ) {
  if ( strlen($_POST['quizname']) < 1 )  {
    $failure = "Quiz Name is required";
  } 
  else{
    $_SESSION['gamemode'] = "Custom";
    $_SESSION['quiz-name'] = $_POST['quizname'];
    header('Location: create-quiz3.php');
  }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz Zone</title>
    <link rel="stylesheet" href="create-quiz.css" />
  </head>
  <body>
    <section class="screen-one">
      <div class="content-flex">
      <h1 class="title-secondary">
        Quiz Zone</h1>
      <h1 class="title-principal">"Create Custom Quiz"
      </h1>
      <div class="user-form">
        <div>

        <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }

         ?>
           <form method="post">
          <p class="subtitle">Quiz Name</p>
         
          <input class="input-name" id="name1" name="quizname" type="text" placeholder="Enter the quiz name......" />
          <p id="error-name"></p>
        </div>
        <div>  
        <button class="btn-principal" name="quiznamecheck">Continue</button>
        
      </div> 
      </div>
      </form>
    </section>
    <script src="create-quiz.js"></script>
  </body>
</html>

