<?php

require_once "../Signup/pdo.php";
session_start();
$username = $_SESSION['username'];

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


if (isset($_POST['submit1'])){
    $score = $_SESSION['score'];
    $guessoption2 = test_input($_POST["option2"]);
    
    

    if($row['AnswerTwo'] === $guessoption2){
        $score = $_SESSION['score'];
        $score = $score + 10;
    }

    $_SESSION['score'] = $score;
    
     header("Location: play-quiz3.php");
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
    <script>

    function timeout(){
     var minute = Math.floor(timeLeft/60);
     var second = timeLeft%60;
     if (timeLeft <= 0){
       clearTimeout(tm);
       window.location.href = "play-quiz3.php";
     }
     else{
       document.getElementById("time").innerHTML= minute + ":" + second; 
     }
     timeLeft--;
     var tm = setTimeout(function(){timeout()},1000);
     }
     </script>
    
  </head>
  <script>
  timeLeft = (1/6)*60;
  </script>

  <body onload="timeout()">

  <div id="time" style="float: right; font-size: 60px; color: red;">timeout</div>


    <section class="questions-present-two">
      <div class="content-flex">
      <h4>Question 2/3</h4>
    <h2><?php echo htmlentities($row['SecondQuestion']); ?></h2>
    <form method="post">
      <div>
      <label><input type="radio" name="option2" <?php if (isset($option2) && $option2=="A") echo "checked";?> value="A"><?php echo htmlentities($row['OptionTwoOne']); ?></label>
      <label><input type="radio" name="option2" <?php if (isset($option2) && $option2=="B") echo "checked";?> value="B"><?php echo htmlentities($row['OptionTwoTwo']); ?></label>
      </div>
      <div>
      <label><input type="radio" name="option2" <?php if (isset($option2) && $option2=="C") echo "checked";?> value="C"><?php echo htmlentities($row['OptionTwoThree']); ?></label>
      <label><input type="radio" name="option2" <?php if (isset($option2) && $option2=="D") echo "checked";?> value="D"><?php echo htmlentities($row['OptionTwoFour']); ?></label>
      </div>
    
    <button class="btn-principal" name="submit1">Next</button>
      </div>
    </section>
    </form>
    <script src="play-quiz.js"></script>
  </body>
</html>

