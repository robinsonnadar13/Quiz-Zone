<?php

require_once "../Signup/pdo.php";
session_start();
$username = $_SESSION['username'];
$score = $_SESSION['score'];
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
                ':AnswerThree' => $answer3));
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }

  

if (isset($_POST['submit'])){
    $guessoption3 = test_input($_POST["option3"]);
    if($row['AnswerThree'] === $guessoption3){
        $score = $score + 10;
    }

    $_SESSION['score'] = $score;
    
    $score = $_SESSION['score'];
    $username = $_SESSION['username'];
    $gamecode = $_SESSION['gamecode'];
    $createdby = $row['username'];

      $sql = "INSERT into leaderboard ( QuizID, UserName, TotalScore, createdby) VALUES ( :QuizID, :UserName, :TotalScore, :createdby)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
               ':QuizID' => $gamecode,
               ':UserName' => $username,
               ':createdby' => $createdby,
               ':TotalScore' => $score));
    

    header("Location: play4.php");
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

    <section class="questions-present-three">
      <div class="content-flex">
      <h4>Question 3/3</h4>
    <h2><?php echo htmlentities($row['ThirdQuestion']); ?></h2>
    <form method="post">
      <div>
      <label><input type="radio" name="option3" <?php if (isset($option3) && $option3=="A") echo "checked";?> value="A"><?php echo htmlentities($row['OptionThreeOne']); ?></label>
      <label><input type="radio" name="option3" <?php if (isset($option3) && $option3=="B") echo "checked";?> value="B"><?php echo htmlentities($row['OptionThreeTwo']);?></label>
      </div>
      <div>
      <label><input type="radio" name="option3" <?php if (isset($option3) && $option3=="C") echo "checked";?> value="C"><?php echo htmlentities($row['OptionThreeThree']); ?></label>
      <label><input type="radio" name="option3" <?php if (isset($option3) && $option3=="D") echo "checked";?> value="D"><?php echo htmlentities($row['OptionThreeFour']); ?></label>
      </div>
    <button class="btn-principal" name="submit">Submit</button>    
      </div> 
    </section>
    </form>
    <script src="play-quiz.js"></script>
  </body>
</html>

