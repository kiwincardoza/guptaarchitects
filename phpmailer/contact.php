
<?php
//get variables from form
 
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['message'];
$_SESSION['bilal']=$name;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kiwincardoza@gmail.com';                 // SMTP username
    $mail->Password = "bennyisfine";                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //sender
    $mail->setFrom($email, 'Bilal');
        //Recipients
    $mail->addAddress('kiwincardoza@gmail.com', $name);     // Add a recipient
   
//body
    $body="<p><strong>HELLO!!</strong><br><br> You have recieved a enquiry from ".$name."<br><br>Message : ".$comment."<br><br>Mail Address ".$email."</p>";
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Website enquiry from '.$name;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

     ?>
     <html>
     <head>
        <meta http-equiv="refresh" content="3; url=index2.html" />
    </head>
    <body>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h2><center>Thank you for your response !!!</center></h2>
        <br><center>Redirecting......</center>
    </body>
    </html>
    <?php
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>