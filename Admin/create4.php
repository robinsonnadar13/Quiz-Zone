<?php
require_once "../Signup/pdo.php";
session_start();
$category = $_SESSION['category'];
$failure = false; 
$option = "";

if ( isset($_POST['QuestionSecondClick'] ) ) {

  $_SESSION['question2'] = $_POST['questionTwo'];

  $_SESSION['option21'] = $_POST['question-two-one'];
  $_SESSION['option22'] = $_POST['question-two-two'];
  $_SESSION['option23'] = $_POST['question-two-three'];
  $_SESSION['option24'] = $_POST['question-two-four'];

    $option = test_input($_POST["option"]);
    $_SESSION['answer2'] = $option;

    header('Location: create5.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// if ( isset($_POST['QuestionFirstClick'] ) ) {
//   echo"<script>console.log('hii');</script>";
//   echo "hello";
//   if ( strlen($_POST['question']) < 1 )  {
//     $failure = "Question is required";
//   } 

//   if ( strlen($_POST['question-one-one']) < 1 )  {
//     $failure = "Option-1 is required";
//   } 

//   if ( strlen($_POST['question-one-two']) < 1 )  {
//     $failure = "Option-2 is required";
//   } 

//   if ( strlen($_POST['question-one-three']) < 1 )  {
//     $failure = "Option-3 is required";
//   } 

//   if ( strlen($_POST['question-one-four']) < 1 )  {
//     $failure = "Option-4 is required";
//   } 

// }

// if ( isset($_POST['login'] ) ) {
//   header('Location: login.php');
//   return;
// }

// try {

//   if ( isset($_POST['name']) && isset($_POST['mobilenumber']) && isset($_POST['username']) 
//     && isset($_POST['email']) && isset($_POST['password'])) {


//   if ( strlen($_POST['name']) < 1 )  {
//       $failure = "Name is required";
//   } 
//   elseif (preg_match('~[0-9]~', $_POST['name'])){
//       $failure = "Name should not contain any numeric value.";
//   }
//   elseif ( !is_numeric($_POST['mobilenumber']) ) {
//       $failure = "Mobile Number should be numeric";
//   }
//   elseif ( strlen($_POST['username']) < 1 ) {
//       $failure = "User Name is required";
//   } 
//   elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {      
//       $failure = "Invalid Email.";
//   }
  
//   elseif ( strlen($_POST['password']) < 5 ) {
//       $failure = "Use at least 6 characters for password.";
//   } 
//   else{


//         $sql = "INSERT INTO userinfo (name , mobilenumber, username, email, password)
//         VALUES (:name, :mobilenumber, :username, :email, :password)";
//         $stmt = $pdo->prepare($sql);
//         $stmt->execute(array(
//         ':name' => $_POST['name'],
//         ':mobilenumber' => $_POST['mobilenumber'],
//         ':username' => $_POST['username'],
//         ':email' => $_POST['email'],
//         ':password' => $_POST['password']));
//         $comment = "Successfully registered.Please Log In.";  
      
//   }

// }
// }
// catch (\PDOException $e) {
//   if ($e->errorInfo[1] == 1062) {
//       $failure = "Phone Number or User Name already registered.";
//   }
// }

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
    <section class="questions-present-two">
    <div class="content-flex"> 
    <?php echo('<p style="color: red; text-align:centre;">'.htmlentities($option)."</p>\n"); ?>
    <?php

         if ( $failure !== false ) {
             echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
         }

    ?>
      <h4>Question 2/3</h4>
      <form method="post">
      <input class="input-name" id="name3" type="text" name="questionTwo" placeholder="Type question here......" required/>
  
    <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="A") echo "checked";?> value="A"><input name="question-two-one" class="input-name" id="option21" type="text" placeholder="Option 1" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="B") echo "checked";?> value="B"><input name="question-two-two" class="input-name" id="option22" type="text" placeholder="Option 2" required/></label>
      </div>
      <div>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="C") echo "checked";?> value="C"><input name="question-two-three" class="input-name" id="option23" type="text" placeholder="Option 3" required/></label>
      <label><input type="radio" name="option" <?php if (isset($option) && $option=="D") echo "checked";?> value="D"><input name="question-two-four" class="input-name" id="option24" type="text" placeholder="Option 4" required/></label>
      </div>
    
    <button  class="btn-principal" name="QuestionSecondClick">Next</button>
      </div>
    </section>
    </form>
    <script src="create-quiz.js"></script>
  </body>
</html>

