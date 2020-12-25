<?php

require_once "Signup/pdo.php";

if (isset($_POST['submit'])){

  try {

    $image1 = file_get_contents(addslashes($_FILES['f1']['tmp_name']));
    $check = getimagesize($_FILES["f1"]["tmp_name"]);

 
          $sql = "INSERT INTO quizdata (id, Name, image, category)
          VALUES (:id, :Name, :image, :category)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(array(
          ':id' => $_POST['id'],
          ':Name' => $_POST['Name'],
          ':category' => $_POST['category'],
          ':image' => $image1));
    	  
          header('Location: updatetp.php');
          return;   

          $comment = "Successfully updated.";
             
    }


    catch (\PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        $failure = "Id already present.";
    }
}
}

    
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



 <h2 style="color: blue;">Update Quiz</h2>

                    <?php

                     if ( $failure !== false ) {
                     echo('<p style="color: red; text-align:centre;">'.htmlentities($failure)."</p>\n");
                     }

                     if ( $comment !== false ) {
                     echo('<p style="color: green; text-align:centre;">'.htmlentities($comment)."</p>\n");
                     }

                    ?>
                    
                    <form name="form1" action="" method="POST" enctype="multipart/form-data">
                    <table>
                    <tr>
                    <td class="text-center">Id</td>
                    <td><input type="number" name="id"></td>
                    </tr>
                    <tr>
                    <td class="text-center">Name</td>
                    <td><input type="text" name="Name"></td>
                    </tr>
                    <tr>
                    <td class="text-center">Category</td>
                    <td><input type="text" name="category"></td>
                    </tr>
                    <tr>
                    <td class="text-center">Image</td>
                    <td><input type="file" name="f1"></td>
                    </tr>
                    <tr>
                    <br>
                    <tr>
                    </tr>
                    <td class="text-center">Click to Upload </td>
                    <td> <input type="submit" name="submit" value="upload"> </td>
                    </tr>
                    </table>
                  </form>
                </div>
</body>
</html>