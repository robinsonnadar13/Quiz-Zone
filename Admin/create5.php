<?php
require_once "../Signup/pdo.php";
session_start();
$category = $_SESSION['category'];
$failure = false; 
$option = "";

if ( isset($_POST['QuestionThirdClick'] ) ) {
 
  $_SESSION['question3'] = $_POST['questionThree'];

  $_SESSION['option31'] = $_POST['question-three-one'];
  $_SESSION['option32'] = $_POST['question-three-two'];
  $_SESSION['option33'] = $_POST['question-three-three'];
  $_SESSION['option34'] = $_POST['question-three-four'];

  $option = test_input($_POST["option"]);
  $_SESSION['answer3'] = $option;

  $_SESSION['quizid'] = rand(100000,1000000);

  $quizid = $_SESSION['quizid'];
$quizname = $_SESSION['quiz-name'];
$category = $_SESSION['category'];
$username = $_SESSION['username'];

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
$time = $_SESSION['time'];
$gamemode = $_SESSION['gamemode'];

$sql = "INSERT INTO customquiz (QuizID, username, QuizName, FirstQuestion, OptionOneOne, OptionOneTwo, OptionOneThree, OptionOneFour, AnswerOne, SecondQuestion, OptionTwoOne, OptionTwoTwo, OptionTwoThree, OptionTwoFour, AnswerTwo, ThirdQuestion, OptionThreeOne, OptionThreeTwo, OptionThreeThree, OptionThreeFour, AnswerThree, Time, gamemode)
           VALUES (:QuizID, :username, :QuizName, :FirstQuestion, :OptionOneOne, :OptionOneTwo, :OptionOneThree, :OptionOneFour, :AnswerOne, :SecondQuestion, :OptionTwoOne, :OptionTwoTwo, :OptionTwoThree, :OptionTwoFour, :AnswerTwo, :ThirdQuestion, :OptionThreeOne, :OptionThreeTwo, :OptionThreeThree, :OptionThreeFour, :AnswerThree, :Time, :gamemode)";
           $stmt = $pdo->prepare($sql);
           $stmt->execute(array(
           ':QuizID' => $quizid,
           ':username' => $username,
           ':QuizName' => $quizname,
           ':FirstQuestion' => $question1,
           ':OptionOneOne' => $option11,
           ':OptionOneTwo' => $option12,
           ':OptionOneThree' => $option13,
           ':OptionOneFour' => $option14,
           ':AnswerOne' => $answer1,
           ':SecondQuestion' => $question2,
           ':OptionTwoOne' => $option21,
           ':OptionTwoTwo' => $option22,
           ':OptionTwoThree' => $option23,
           ':OptionTwoFour' => $option24,
           ':AnswerTwo' => $answer2,
           ':ThirdQuestion' => $question3,
           ':OptionThreeOne' => $option31,
           ':OptionThreeTwo' => $option32,
           ':OptionThreeThree' => $option33,
           ':OptionThreeFour' => $option34,
           ':gamemode' => $gamemode,
           ':Time' => $time,
           ':AnswerThree' => $answer3));
 

  header('Location: create6.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
      <section class="questions-present-three">
      <div class="content-flex">
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }

         ?>
    
      <h4>Question 3/3</h4>
      <form method="post">
    <input class="input-name" id="name4" type="text" name="questionThree" placeholder="Type question here......" required/>
  
    <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="A") echo "checked";?> value="A"><input name="question-three-one" class="input-name" id="option31" type="text" placeholder="Option 1" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="B") echo "checked";?> value="B"><input name="question-three-two" class="input-name" id="option32" type="text" placeholder="Option 2" required/></label>
      </div>
      <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="C") echo "checked";?> value="C"><input name="question-three-three" class="input-name" id="option33" type="text" placeholder="Option 3" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="D") echo "checked";?> value="D"><input name="question-three-four" class="input-name" id="option34" type="text" placeholder="Option 4" required/></label>
      </div>
    
    <button class="btn-principal" name="QuestionThirdClick">Next</button>    
      </div> 
    </section>
    </form>
    <script src="create-quiz.js"></script>
  </body>
</html>

