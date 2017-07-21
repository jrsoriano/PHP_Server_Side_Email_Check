<?php
/* Set e-mail recipient */
$myemail = //"email address you want msg sent to";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Your Name");
$email = check_input($_POST['email'], "Your E-mail Address");
$phone = check_input($_POST['phone'], "Your Phone Number");
$message = check_input($_POST['comment'], "Your Message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("Invalid e-mail address");
}

/*e-mail format*/

$subject = //"Subject you want email msg. to have";

$message = "
Name: $name
Email: $email
Phone#: $phone

Message: $message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);


/* Redirect visitor to the thank you page */
header('Location: http://address-of-confirmation-page.html');
exit();


/* Functions used */
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