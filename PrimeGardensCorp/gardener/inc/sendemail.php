<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "mail@mail.com" );

// Read the form values
$success = false;
$fName = isset( $_POST['fname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['fname'] ) : "";

$lName = isset( $_POST['lname'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['lname'] ) : "";

$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";

$street = isset( $_POST['street'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['street'] ) : "";

$city = isset( $_POST['city'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['city'] ) : "";

$zip = isset( $_POST['zip'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['zip'] ) : "";

$services = isset( $_POST['services'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['services'] ) : "";

$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";

$subject = 'A contact request send by' . $fName . $lName;

$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";


$body = 'Name: '. $fName . $lName . '<br>';
$body .= 'Email: '. $senderEmail . '<br>';
$body .= 'Phone: '. $phone . '<br>';
$body .= 'Street: '. $street . '<br>';
$body .= 'City: '. $city . '<br>';
$body .= 'Zip: '. $zip . '<br>';
$body .= 'Services: '. $services . '<br>';
$body .= 'Message: <br>'. $message;


// If all values exist, send the email
if ( $fName && $senderEmail && $message ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $fName . $lName . " <" . $senderEmail . ">";  
  $success = mail( $recipient, $subject, $body, $headers );
  echo "<p class='success'>Thanks for contacting us. We will contact you ASAP!</p>";
}

?>