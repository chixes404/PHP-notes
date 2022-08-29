<?php



//print_r($_FILES);superGlobal FILES is an array which include {name,type,tmp-name,error,size}
if(isset($_FILES['file']))
{ 
 $name=$_FILES['file']['name'];// when you want to get thing from array you get it by this[array][thing]
 $type=$_FILES['file']['type'];     
 $tmp=$_FILES['file']['tmp_name'];// when you upload file it uploaded in this temporary path until you move it to specfic path you want     
 $size=$_FILES['file']['size'];     
 $error=$_FILES['file']['error']; 

 $errors=array();

 $Allexten=array('png','jpg','jpeg','gif');
 
 $exten = explode('.', $name);

$resultEX  = strtolower(end($exten));

//echo $resultEX;
echo"<br>";
 

 if($error==4)
 {
   $errors[]="no file uploaded";
 }
 else{
 

 if(!in_array($resultEX,$Allexten))
 {

    $errors[]="invalid extension";
 }


 if($size>8000000)
 {
   $errors[]="fuck off size is large";
 }
 }
 if(empty($errors))  
 {
      move_uploaded_file($tmp,"hawash/".$name);
   }  
 else 
  {
    foreach($errors as $err)
     
     {
      echo $err;
    
     }



  } 
}















?>

<!DOCTYPE html>
 <head>

<title>upload page</title>

</head>
<body>
    <h1> upload your fuckiiiin file </h1>
    <form method='post' action='Upload.php' enctype='multipart/form-data'><!-- yiu must put enctype when you make file input-->
        <input type='file' name='file' multiple='multiple'><!--multiple if you want to upload multiple file--> 
        <input type='submit' name='upload' >




    </form>
</body>
