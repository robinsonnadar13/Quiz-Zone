<?php

require_once "../Signup/pdo.php";
session_start();
$score = $_SESSION['score'];
$username = $_SESSION['username'];
$gamecode = $_SESSION['gamecode'];

if (isset($_POST['tryagain'])){
  header("Location: leaderboard-play.php");
}

if (isset($_POST['ghar'])){
  header("Location: ../Home/index.php");
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz Zone</title>
    <link rel="stylesheet" href="play-quiz.css" />
  </head>
  <body>
<section class="screen-results">
<form method="post">
    <div class="content-flex">
     <h1 class="title-principal">Your Score</h1>
     <div  class="total-score"><?php echo htmlentities($_SESSION['score']); ?></div>
     <div class="content-btn">
     <button class="btn-principal mr-45 mt-50" name="tryagain" >LeaderBoard</button>
     <button class="btn-principal mt-50" name="ghar">Go Home</button>
     </div>
     </div>
    </section>
    </form>
    <script src="play-quiz.js"></script>
  </body>
</html>