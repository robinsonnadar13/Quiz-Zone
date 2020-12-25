<?php

$createdby = $_SESSION['username'];

$sql = "SELECT UserName,TotalScore FROM leaderboard WHERE createdby = $creat";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':qid' => $_POST['QuizID'],
            ':un' => $_POST['UserName'],
            ':ts' => $_POST['TotalScore'],
            ':cb' => $_POST['createdby']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html>
  <head>
  <link rel="stylesheet" href="admin1.css">
  </head>
  <body>
  <div class="wrapper">
        <!-- PRICING-TABLE CONTAINER -->
        <div class="pricing-table group">
            <h1 class="heading">
                Admin DashBoard
            </h1>
            <!-- BUSINESS -->
            <div class="block business fl">
                <h2 class="title">LeaderBoard for <?php echo htmlentities($quizname); ?></h2>
                <!-- CONTENT -->
                <div class="content">
                    <p class="price">
                  
                        <span><?php echo htmlentities($topscore); ?></span>
                  
                    </p>
                </div>
                <!-- /CONTENT -->

                <!-- FEATURES -->
                <ul class="features">
                    <li><span class="fontawesome-cog"></span>25 WordPress Install</li>
                </ul>
                <!-- /FEATURES -->

                <!-- PT-FOOTER -->
                <div class="pt-footer">
                    <p>Host My Website</p>
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