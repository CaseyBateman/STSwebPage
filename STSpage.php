<?php

$email_to = "scarcit103@gmail.com";

$email_sub = "STS Web Page Email";

$child_name = $_POST['child_name'];
$parent_name = $_POST['parent_name'];
$email_add = $_POST['email_add'];
$phone_num = $_POST['phone_num'];
$child_age = $_POST['child_age'];

$email = htmlspecialchars($_POST['email_add']);

if (!preg_match("/^[a-zA-Z ]*$/", $child_name))
{
    die("Child's Name is not valid.");
}
if (!preg_match("/^[a-zA-Z ]*$/", $parent_name))
{
    die("Parent's Name is not valid.");
}
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
{
    die("E-mail address not valid.");
}
if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone_num))
{
    die("Phone Number is not valid.");
}
if (!preg_match("/^[0-9]{2}$/", $child_age))
{
    die("Child's Age is not valid.");
}



$email_message = "Hi, I am " . $parent_name . "\n" . "This is my information " . "\n" . "Child Name: " . $child_name . "\n" . "Child Age: " . $child_age . "\n" . "Email Address: " . $email_add . "\n" . "Phone Number: " . $phone_num . ".";

$headers = 'From: '.$email_add."\r\n".
'Reply-To: '.$email_add."\r\n".
'X-Mailer: PHP/' . phpversion();



mail($email_to, $email_sub, $email_message, $headers);

echo "Thanks for sending us your information!";

sleep(5);
Redirect('http://localhost/STSwebpage/STSpage.html', false);

function Redirect($url, $permanent = false)
{
    if (headers_sent() ===false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}

?>