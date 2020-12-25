<?php 

// Include library file
        require_once 'VerifyEmail.class.php'; 

        // Initialize library class
        $mail = new VerifyEmail();

        // Set the timeout value on stream
        $mail->setStreamTimeoutWait(20);

        // Set debug output mode
        $mail->Debug= TRUE; 
        $mail->Debugoutput= 'html'; 

        // Set email address for SMTP request
        $mail->setEmailFrom('quizzoneforyou@gmail.com');

        // Email to check
        $email = 'robinsonnadar13@gmail.com'; 

        // Check if email is valid and exist
        if($mail->check($email)){ 
        $failure = 'Email &lt;'.$email.'&gt; is exist!'; 
        }
        elseif(verifyEmail::validate($email)){ 
        $failure = 'Email &lt;'.$email.'&gt; is valid, but not exist!'; 
        }
        else{ 
        $failure = 'Email &lt;'.$email.'&gt; is not valid and not exist!'; 
        } 

        ?>