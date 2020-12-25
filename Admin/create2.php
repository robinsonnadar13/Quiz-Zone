<?php
require_once "../Signup/pdo.php";
session_start();
$quizname = $_SESSION['quiz-name'];
$failure = false; 
$comment = false;

if ( isset($_POST['science'] ) ) {
    $_SESSION['gamemode'] = "Testmode";
    $_SESSION['time'] = 10;
    header('Location: create3.php');
}

if ( isset($_POST['entertainment'] ) ) {
    $_SESSION['gamemode'] = "Testmode";
    $_SESSION['time'] = 30;
    header('Location: create3.php');
}

if ( isset($_POST['Others'] ) ) {
    $_SESSION['gamemode'] = "Testmode";
    $_SESSION['time'] = 60;
    header('Location: create3.php');
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
    <section class="screen-two">
      <div class="content-flex">
      <h1 id="name-user" class="title-principal">Select time duration for each question:</h1>
      <div class="section-opc">
      <form method="post">
      <div class="opc-one">
        <button class="btn-principal mt-50" name="science">30 seconds</button>
      </div>
      <div class="opc-one">
        <button class="btn-principal " name="entertainment">1 minute</button>
      </div>
      <div class="opc-two">
        <button class="btn-principal" name="Others">2 minute</button>
      </div>

      
</form>
      </div>
      <div>
    </section>
  </body>
</html>

