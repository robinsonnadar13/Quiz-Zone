<?php

require_once "Signup/pdo.php";
session_start();
$quizname = $_SESSION['quiz-name'];

header("Location: Demo Quiz/index.php?query=".urlencode($quizname)); 
return; 

?>