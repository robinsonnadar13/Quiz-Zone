<?php
require_once "../Signup/pdo.php";
session_start();
$quizid = $_SESSION['quizid'];
$quizname = $_SESSION['quiz-name'];
$category = $_SESSION['category'];
$username = $_SESSION['username'];
$_SESSION['createdby'] = $username;

$answer1 = $_SESSION['answer1'];
$answer2 = $_SESSION['answer2'];
$answer3 = $_SESSION['answer3'];

$question1 = $_SESSION['question1'];
$option11 = $_SESSION['option11'];
$option12 = $_SESSION['option12'];
$option13 = $_SESSION['option13'];
$option14 = $_SESSION['option14'];
$answer1 = $_SESSION['answer1'];

$question2 = $_SESSION['question2'];
$option21 = $_SESSION['option21'];
$option22 = $_SESSION['option22'];
$option23 = $_SESSION['option23'];
$option24 = $_SESSION['option24'];
$answer2 = $_SESSION['answer2'];

$question3 = $_SESSION['question3'];
$option31 = $_SESSION['option31'];
$option32 = $_SESSION['option32'];
$option33 = $_SESSION['option33'];
$option34 = $_SESSION['option34'];
$answer3 = $_SESSION['answer3'];

$failure = false; 

if ( isset($_POST['gohome'] ) ) {
  header("Location: ../Home/index.php");
  return;
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
<section class="screen-results">
<form method="post">
    <div class="content-flex">
     <h1 class="title-principal">Your Quiz Code is</h1>
     <div  class="total-score" id="score"><?php echo htmlentities($quizid); ?></div>
     <div class="content-btn">
     <button class="btn-principal mr-45 mt-50" href="create-quiz1.php">LeaderBoard</button>
     <button class="btn-principal mt-50" name="gohome">Go Home</button>
     </div>
     </div>
    </section>
    </form>
    <script src="create-quiz.js"></script>
  </body>
</html>