<?php include "DBp_conn.php";?>
<?php
session_start();
if(isset($_POST['login']))
 
{
 $name= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
 $email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
 $pass= filter_var($_POST['pass'],FILTER_SANITIZE_STRING);

 $error=[];


 if(empty($name))
 {
   $error[]="username required"; 
 }

 $check_exxistance="SELECT name FROM form where name ='$name'";
 $resultt=mysqli_query($conn,$check_exxistance);
 $usertaken=mysqli_fetch_assoc($resultt);
 if($usertaken)
 {
   $error[]="name already exist";
  }


 if(empty($email))
 {
   $error[]="email required";
 }
 elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false) 
   {
      $error[]="must valid email address";
      }

 $check_existance="SELECT email FROM form where email ='$email'";
 $result=mysqli_query($conn,$check_existance);
 $take=mysqli_fetch_assoc($result);
 if($take)
 {
   $error[]="email already exist";
  }




 if(empty($pass))
 {
        $error[]="password required"; 
  }


 if(empty($error)){
   $password=sha1($pass);
  
    $query="INSERT INTO form (name,email,password) values('$name','$email','$pass')";
    $query_conn=mysqli_query($conn,$query);
    $_SESSION['user']=$name;
    header("location:index2.php");
  } else {
     var_dump($error);
    }
  
  
 
}

?>
<!DOCTYPE html>

<head>
    <title> sign up</title>
</head>
<body>
<h1 class="text-center">sign up</h1>
<form action="signUP2.php" method="post">
<label> username</label>
<input type="text" name="name" value="<?php if(isset($_POST["name"])){echo $_POST["name"];} ?>">
<br>
<br>
<label> Email</label>
<input type="email" name="email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>">
<br>
<br>
<label>password</label>
<input type="password" name="pass">
<br>
<br>

<input type="submit" name="login" value="login">
<br>
<br>
<br>
 <strong>i have account</strong>  <a href="login.php">login</a> 
</form>

 
</body>






