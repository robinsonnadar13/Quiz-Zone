<?php 

require_once "Signup/pdo.php";
session_start();
$username = $_SESSION['username'];

$sql = "SELECT email,name,password FROM userinfo WHERE username = '$username'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
            ':ag' => $_POST['email'],
            ':rn' => $_POST['name'],
            ':pw' => $_POST['password']));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


$email = $row['email'];
$User = $row['name'];
$password = $row['password'];

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'quizzoneforyou@gmail.com';                 // SMTP username
$mail->Password = 'quizzoneforyou810@';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('quizzoneforyou@gmail.com', 'Quiz Zone');
$mail->addAddress($email, $User);     // Add a recipient

// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Update from Quiz Zone';
$mail->Body = '<!DOCTYPE html>
<html>
<title>Quiz Zone</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">

  <div class="w3-card-4" style="width:50%;">
    <header class="w3-container w3-blue">
      <h1>Quiz Zone</h1>
    </header>

    <div class="w3-container">
    	<h2>Hi '.$username.',</h2>
      <p>Seems like you forgot your password for your Quiz Zone account. If this is true, your password is '.$password.'.</p>
      <p>If you did not forget your password you can safely ignore this email.</p>
    </div>

    <footer class="w3-container w3-blue">
      <h4>Thanks,</h4>
      <h4>Quiz Zone team</h4>
    </footer>
  </div>
</div>

</body>
</html>
';




if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    header("Location: Signup/login.php");
}

?>