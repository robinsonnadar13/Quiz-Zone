<?php
require_once "../Signup/pdo.php";
session_start();
$quizname = $_SESSION['quiz-name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entertainment</title>
    <link rel="stylesheet" href="app.css">
</head>
<body>
    <div class="container">
        <div id="home" class="flex-center flex-column">
            <h1>Entertainment</h1>
            <a class="btn" href="game-entertainment.php">Play</a>
            <a class="btn" href="highscores.php">High Scores</a>    
        </div>
    </div>
</body>
</html>