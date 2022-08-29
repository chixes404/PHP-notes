<?php include "DBp_conn.php"; ?>
<?php
 session_start();
 if(isset($_POST['login']))
 {
     //sanitization
 $username=mysqli_real_escape_string($conn,$_POST['name']);
 $password= filter_var($_POST['pass'],FILTER_SANITIZE_STRING);

 //validation
 
$error=[];

 if(empty($username))
 {
     $error[]="username is required";
 }

 if(empty($password))
 {
     $error[]="password required";
 }
 
 if(empty($error))
 {

 
 // check if username and email is existed in DB 
 $check_existance="SELECT * FROM form where name ='$username' and password ='$password'";
 $result=mysqli_query($conn,$check_existance);
 $userinfo=mysqli_fetch_assoc($result);
  if(!$userinfo)
  {
    $error[]=  "invalid information";
     }
 else {

header("location:dash.php");
 }

 
 } 


 }



 
 
 



?>






<!DOCTYPE html>

<head>
    <title> Login</title>
</head>
<body>
<h1 class="text-center">Login</h1>
<form action="login.php" method="post">
    <?php  
if (isset($error))
{
  if(!empty($error))
 {
   foreach($error as $err)
   {

    echo $err ."<br>"."<br>";
    }

  }


 }

?>
<label> username</label>
<input type="text" name="name">
<br>
<br>
<label>password</label>
<input type="password" name="pass">
<br>
<br>

<input type="submit" name="login" >
<br>
<br>
<a href ="signUp.php">Signup</a>
</form>

 
</body>