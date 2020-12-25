<?php
require_once "../Signup/pdo.php";
session_start();
$category = $_SESSION['category'];
$failure = false; 
$option = "";



if ( isset($_POST['QuestionClick'] ) ) { 
  
    $_SESSION['question1'] = $_POST['questionOne'];

    $_SESSION['option11'] = $_POST['question-one-one'];
    $_SESSION['option12'] = $_POST['question-one-two'];
    $_SESSION['option13'] = $_POST['question-one-three'];
    $_SESSION['option14'] = $_POST['question-one-four'];

    $option = test_input($_POST["option"]);
    $_SESSION['answer1'] = $option;

    header('Location: create4.php');
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
    <section class="questions-present-one">
    <div class="content-flex"> 
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }
    ?>
    <h4>Question 1/3</h4>
    <form method="post">
    <input class="input-name" id="name2" type="text" name="questionOne" placeholder="Type question here......" required/>
    
    
      <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="A") echo "checked";?> value="A"><input name="question-one-one" class="input-name" id="option11" type="text" placeholder="Option 1" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="B") echo "checked";?> value="B"><input name="question-one-two" class="input-name" id="option12" type="text" placeholder="Option 2" required/></label>
      </div>
      <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="C") echo "checked";?> value="C"><input name="question-one-three" class="input-name" id="option13" type="text" placeholder="Option 3" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="D") echo "checked";?> value="D"><input name="question-one-four" class="input-name" id="option14" type="text" placeholder="Option 4" required/></label>
      </div>
      
    <button class="btn-principal" name="QuestionClick" >Next</button>
       
    </div>
    </section>
  </form>
    <script src="create-quiz.js"></script>
  </body>
</html>

