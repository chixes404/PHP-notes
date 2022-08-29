<?php 
session_start();
if((!isset($_SESSION['user'])))
{
    header("location:login.php");
    exit();
}





?>
<!doctype html>
<head>
    <title> php</title>
</head>
<body>

<p>kosmook hahahahahahahahahahahahahahhahah</p>

 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="logout.php">log_out</a>
</body>