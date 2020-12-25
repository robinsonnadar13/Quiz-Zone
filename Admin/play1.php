<?php

require_once "../Signup/pdo.php";
require_once "../Signup/Dbconnect.php";
session_start();
$username = $_SESSION['username'];
unset($_SESSION['score']);
$score = 0;
$gamecode = $_SESSION['gamecode'];

if (  isset($_SESSION["gamecode"] )) {
  $sql = "SELECT * FROM customquiz WHERE QuizID = $gamecode";
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
                ':AnswerThree' => $answer3));
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  $gamemode = $row['gamemode'];


if (isset($_POST['submit'])){

    $guessoption2 = test_input($_POST["option1"]);
    
    

    if($row['AnswerOne'] === $guessoption1){
        $score = $score + 10;
    }

    $_SESSION['score'] = $score;
    
     header("Location: play2.php");
    return;
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
    <link rel="stylesheet" href="play-quiz.css" />
    
  </head>



  <body>


    <section class="questions-present-two">
      <div class="content-flex">
      <h4>Question 1/3</h4>
    <h2><?php echo htmlentities($row['FirstQuestion']); ?></h2>
    <form method="post">
      <div>
      <label><input type="radio" name="option2" <?php if (isset($option1) && $option2=="A") echo "checked";?> value="A"><?php echo htmlentities($row['OptionOneOne']); ?></label>
      <label><input type="radio" name="option2" <?php if (isset($option1) && $option2=="B") echo "checked";?> value="B"><?php echo htmlentities($row['OptionOneTwo']); ?></label>
      </div>
      <div>
      <label><input type="radio" name="option2" <?php if (isset($option1) && $option2=="C") echo "checked";?> value="C"><?php echo htmlentities($row['OptionOneThree']); ?></label>
      <label><input type="radio" name="option2" <?php if (isset($option1) && $option2=="D") echo "checked";?> value="D"><?php echo htmlentities($row['OptionOneFour']); ?></label>
      </div>
    
    <button class="btn-principal" name="submit">Next</button>
      </div>
    </section>
    </form>
    <script src="play-quiz.js"></script>
  </body>
</html>

