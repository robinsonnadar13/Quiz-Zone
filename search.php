<?php
require_once "Signup/pdo.php";
session_start();
$username = $_SESSION['username'];

$querysearch =  $_SESSION['query-search'];
$querysearched = preg_replace("#[^0-9a-z]#i","",$querysearch);

if ( isset($_POST['search'] ) ) {
    $_SESSION['query-search'] = $_POST['query'];
    header("Location: search.php?query=".urlencode($_POST['query']));
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz Zone</title>
  <link rel = "icon" href = "Images/quizZone.png" type = "image/x-icon"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="home.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="Images/quizZone.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Activity</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Admin/admin.php">Create a new quiz</a>
    </li>
    
    <?php
    if ( ! isset($_SESSION["username"] )) {
    echo'<li class="nav-item2">';
       echo'<a class="nav-link" href="Signup/login.php" style="padding-right: 150px;">Login</a>';
    echo'</li>';
    echo'<li class="nav-item2">';
      echo'<a class="nav-link" href="Signup/signup.php" style="padding-right: 60px;">Signup</a>';
    echo'</li>';
    }

    else{
    	echo'<div class="dropdown" style="padding-top: 4px; margin-right: 10%; padding-right: 60px;" >';
    echo'<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="font-size: 16px;text-align: center; margin-top: 2.8px; background-color: #ffa70f;">';
    echo htmlentities($username);
    echo'</button>';
    echo'<ul class="dropdown-menu">';
    echo'<li><a href="Signup/account.php" style="font-size: 16px;">My Account</a></li>';
    echo'<li><a href="Signup/logout.php" style="font-size: 16px;">Logout</a></li>';
    echo'</ul>';
    }

    ?>

  </ul>
</nav>
<!-- Navbar End -->


<!-- Search Quiz -->

<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                        <form method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="query" type="search" placeholder="Find a quiz using keyword">
                                    </div>
                                    <!--end of col-->
                                    
                                    <div class="col-auto">
                                        <button class="btn btn-lg" name="search" type="submit">Search</button>
                                    </div>
                                    </form>
                                    <!--end of col-->
                                </div>
                        
                        </div>
                        <!--end of col-->
                    </div>
</div>
<!-- End of Search Quiz -->


<br>
<br>
<br>
<br>
<h5>Top results for '<?php echo htmlentities($querysearched); ?>'</h5>

<div class="row mt-2 pb-3">
                    <?php
                        include 'Signup/Dbconnect.php';
                        $stmt = $conn->prepare("SELECT * FROM quizdata where Name like ? or category like ? ");
                        $stmt->bind_param("ss",$querysearched,$querysearched); 
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while  ($row = $result->fetch_assoc()):
            
                    ?>
<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
      <div class= "card-deck">
            <div class="card p-2 border-secondary mb-2">
                    <?php 
                                echo'<img src="data:image/jpeg;base64, '.base64_encode($row['image']).'" alt="Image" class="card-img-top" height="180">';
                    ?>
                    <div class="card-body p-1">
                          <h5 class="card-title text-center"><?= $row['Name'] ?></h5>
                          <div class="card-footer p-1">
                            <a href="Demo Quiz/index-science.php"><button class="btn btn-info btn-block addItemBtn">Attempt&nbsp;</button></a>
                          </div>   
                    </div>
              </div>
        </div>
  </div>
                    
  <?php
      
    endwhile;
    // if  ($row == 0){
                
  ?>
  <!-- <div>
                <div>
                    <img class="pic" src="../Images/search_nux.png" >
                </div>
                <div class="text-mm">
                    Search for quizzes on math, science, history, and much more...
                </div>
  </div> -->
                <?php  
                // }
                ?> 

</body>
</html>