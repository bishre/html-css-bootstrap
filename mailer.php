<?php

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);          //this makes sure it doesn't spam the name
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);        //makes sure it doesn't spam email     
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);    //makes sure it doesn't spam message


//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';    //make sure you have these files in the correct directory or it won't work
require 'src/PHPMailer.php';    //same here
require 'src/SMTP.php';         //and here

//Create a new PHPMailer instance
$mail = new PHPMailer(true);

//Set who the message is to be sent from
$mail->Host = 'webmail server name ex. mail.server.address';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'domain email for SMTP';                 // SMTP username
$mail->Password = 'password';                           // SMTP password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('domain email for SMTP again', 'Tech.FORM');

//Set an alternative reply-to address
$mail->addReplyTo($email, $name);

//Set who the message is to be sent to
$mail->addAddress('SMTP again');

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
 
 $body = "<strong>Hello</strong>, you have received an inquiry from " . $name . " the message is " . $message . " you can contact them by " . $email;
 
//Replace the plain text body with one created manually
$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Website Inquiry from ' . $name;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);
    
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
    header("location: index.html?sent");             //verifies that it's sent but keeps it the same page, 
                                                     //can redirect to another page
    }
