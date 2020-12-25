<?php

require_once "../Signup/pdo.php";
session_start();
$gamecode = $_SESSION['gamecode'];


if ( isset($_POST['goback'] ) ) {
    // Redirect the browser to cancel
    header('Location: ../home.php');
    return;
}


          $sql = "SELECT UserName,TotalScore FROM leaderboard WHERE QuizID = $gamecode";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':qid' => $_POST['QuizID'],
            ':un' => $_POST['UserName'],
            ':ts' => $_POST['TotalScore'],
            ':cb' => $_POST['createdby']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

          
  

?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Table Style</title>
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <link rel="stylesheet" href="leaderboard-play.css">
</head>

<body>
<div class="table-title">
<h3>LeaderBoard</h3>
</div>
<table class="table-fill">
<thead>
<tr>
<th class="text-left">User Name</th>
<th class="text-left">Total Score</th>
</tr>
</thead>
<tbody class="table-hover">

<?php
  
   include '../Signup/Dbconnect.php';
                        $stmt = $conn->prepare("SELECT UserName,TotalScore FROM leaderboard WHERE QuizID = ? ");
                        $stmt->bind_param("i",$gamecode); 
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while  ($row = $result->fetch_assoc()):

?>

<tr>
<td class="text-left"><?php echo htmlentities($row['UserName']); ?></td>
<td class="text-left"><?php echo htmlentities($row['TotalScore']); ?></td>
</tr>
<?php
                  endwhile; ?>
</tbody>
</table>
  

  </body>