<?php
require_once('class.phpmailer.php');
include("class.smtp.php");
$mail = new PHPMailer();



/* Check all form inputs using check_input function */
$name = check_input($_POST['inputName'], "Your Name");
$email = check_input($_POST['inputEmail'], "Your E-mail Address");
$subject = check_input($_POST['inputSubject'], "Message Subject");
$message = check_input($_POST['inputMessage'], "Your Message");

/**********************************************/

$mail->IsSMTP(); // telling the class to use SMTP

$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "Dannyuser111@gmail.com";  // GMAIL username
$mail->Password   = "dk000000";            // GMAIL password

$mail->SetFrom('Dannyuser111@gmail.com', 'Contact Us submission');

/*******************************************************/


/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */



$message = "

Someone has sent you a message using your contact form:

Name: $name 
Email: $email
Subject: $subject

Message:$message

";

$mail->Subject    = $subject;

$mail->MsgHTML($message);

$address = "arp7887@gmail.com";
$mail->AddAddress($address, "user2");



/* Send the message using mail() function */
//mail($myemail, $subject, $message);


if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} 
else {
  header('Location: thankyou.html');
  exit();
  
}

/* Redirect visitor to the thank you page */
//header('Location: thankyou.html');
//exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html>
<body>

<p>Please correct the following error:</p>
<strong><?php echo $myError; ?></strong>
<p>Hit the back button and try again</p>

</body>
</html>
<?php
exit();
}
?>