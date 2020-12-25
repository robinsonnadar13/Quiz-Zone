<?php
require_once "../Signup/pdo.php";
session_start();
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz Zone Admin</title>
    <link rel = "icon" href = "../Images/quizZone.png" type = "image/x-icon"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Quiz</h3>
      </div>
      <div class="right_area">
        <a href="../Signup/logout.php" class="logout_btn">Logout</a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="download.png" class="profile_image" alt="">
        <h4><?php echo htmlentities($username); ?></h4>
      </center>
      <a href="type.php"><i class="fas fa-desktop"></i><span>Create</span></a>
      <a href="#"><i class="fas fa-search"></i><span>Search</span></a>
      <a href="#"><i class="fas fa-table"></i><span>My Library</span></a>
      <a href="#"><i class="fas fa-th"></i><span>Reports</span></a>
      <a href="#"><i class="fas fa-cogs"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->
      

    


  </body>
  <footer>
  Made by  <a style="color: yellow;">Robinson, Eeshan</a> And <a style="color: yellow;">Siddhant</a>.
</footer>
</html>


































































































<!---->
