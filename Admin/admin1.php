<?php

require_once "../Signup/pdo.php";
require_once "../Signup/Dbconnect.php";
session_start();
$username = $_SESSION['username'];

$sql = "SELECT count(username) FROM customquiz WHERE username = '$username'";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':un' => $username));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

$quizcreated = $row['count(username)'];

$sql = "SELECT count(UserName) FROM leaderboard WHERE UserName = '$username'";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':un' => $username));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

$quizplayed = $row['count(UserName)'];

$sql = "SELECT max(TotalScore) FROM leaderboard WHERE UserName = '$username'";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':un' => $username));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

$topscore = $row['max(TotalScore)'];


?>

<html>
  <head>
  <link rel="stylesheet" href="admin1.css">
  </head>
  <body><div class="area"><nav class="main-menu">
            <ul>
                <li>
                    <a href="../index.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Home
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <<a href="type.php">
                       <i class="fa fa-list fa-2x"></i>
                        <span class="nav-text">
                            Create
                        </span>
                    </a>
                </li>
                <li>
                   <a href="../search.php">
                       <i class="fa fa-table fa-2x"></i>
                        <span class="nav-text">
                            Search
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#">
                       <i class="fa fa-info fa-2x"></i>
                        <span class="nav-text">
                            Settings
                        </span>
                    </a>
                </li>
            </ul>

            <ul class="logout">
                <li>
                <a href="../Signup/logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
    <div class="wrapper">
        <!-- PRICING-TABLE CONTAINER -->
        <div class="pricing-table group">
            <h1 class="heading">
                Admin DashBoard
            </h1>
            <!-- PERSONAL -->
            <div class="block personal fl">
                <h2 class="title">Number Of Quizzes Created</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
            
                        <span><?php echo htmlentities($quizcreated); ?></span>

                    </p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
            
                </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PERSONAL -->
            <!-- PROFESSIONAL -->
            <div class="block professional fl">
                <h2 class="title">Number Of Quizzes Played</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                  
                        <span><?php echo htmlentities($quizplayed); ?></span>
                      
                    </p>
                </div>
                <!-- /CONTENT -->
                <!-- FEATURES -->
                <ul class="features">
                    
                    </ul>
                <!-- /FEATURES -->
                <!-- PT-FOOTER -->
                <div class="pt-footer">
                   
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /PROFESSIONAL -->
            <!-- BUSINESS -->
            <div class="block business fl">
                <h2 class="title">Top Score</h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                  
                        <span><?php echo htmlentities($topscore); ?></span>
                  
                    </p>
                </div>
                <!-- /CONTENT -->

                <!-- FEATURES -->
                <ul class="features">
                    
                </ul>
                <!-- /FEATURES -->

                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    
                </div>
                <!-- /PT-FOOTER -->
            </div>
            <!-- /BUSINESS -->
        </div>
        <!-- /PRICING-TABLE -->
    </div>
    </div>
</body>

</body>

  <script src="admin1.js"></script>
    </html>