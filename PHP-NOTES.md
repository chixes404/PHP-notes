# PHP :

# Array : array consist of key and value

### Indexed array:

1. there is two kind of array indexed and associative .
2. indexed array is array with only number key you can create indexed array as : $arr=array(1,2,3,4,5);  or  $arr=[ ]; 
3. loop in array : there is 2 type of loop (for , for each):

```php
//foor loop :
    for($i=0;$i<count($arr);$i++)
        {
           echo $i;
           }
// for each loop:
foreach($arr as $fuck)  // $arr= array name ,  $fuck = any name you want
{
echo $fuck;
}
```

## associative array :

1. in this array key can be number or string like:

```php
// to create aarray :
  $alpha=array('a'=>1,'b'=>2,'c'=>3);

//  loop in this array is only for each not for :
foreach($alpha as $key=>$value)
{
	 echo $key. "-" .$value;
}

```

# function:

there are two types of function.

- global function : that defined outside of function (it’s value don’t change )
- local function : that defined inside function it’s value (will be change outside function ) if i don’t want it to change define it by global variable.

```php
<?php
$x="mummi";
function cube()
{ global $x;
$x="piip";

}
echo $x;
cube();
echo $x;
echo $x;
//output=mummi piip piip

/*constant value
define("num",15);
echo num; //will be 15
*/
?>
```

# built-in function :

1- string built-in

- strlen()
- strupper()
- strlower()

2- math built-in

- max()
- min()
- rand( )……………………echo rand(1,1000)
- sqrt()
- round()
- abs()

3- array built-in :

- max()…………..echo($list)
- min()
- sort()……………………… $list=[2,5,8,5,45,454,7]

                                         sort($list);

                                         print_r($list);    

  

- in_array( $ given value ,$_var which value in array)………check is given vaue in array or not

# forms to print data in php page:

```php
{html code}
<form action="course.php" method="post">
<label> enter your name</label>
<input type="text" name="name">
<br>
<br>
<label>enter your passwoed</label>
<input type="password" name="pass">
<br>
<br>
<input type="submit" name="submit">

</form>

if(isset($_POST["submit"]))
 $valid=["bassel","rady","khalid","root"];
 $name=$_POST["name"];
 $pass=$_POST["pass"];

if(strlen($name)<2||!in_array($name,$valid))
{
    echo "fuck off";
}
else{
echo $name;
echo $pass;
}
/* // if i want to say if user didn't enter data say enter fucker.
if ($name&&$pass)
{
echo $-post["name];
echo $-post["pass];
}
else 
{
    echo "enter fucker";
}

*/
```

# CREATE database connection with FORM:

```php
$connection=mysqli_connect("localhost","root","roottoor","chics_data");
if ($connection)
{
        echo"connection is done";
echo"<br>";
}
else {
    echo "connection failed";
    echo"<br>";}
```

# INSERT into Database from FORM:

QUERY: s **a request for information from a database management system (DBMS)**
 which is the software program that maintains data. Users can make a 
query to retrieve data or change information in a database, such as 
adding or removing data.

```php
$connection=mysqli_connect("localhost","root","roottoor","chics_data");
$query="insert into user (name,password)";
 $query.="values ('$name','$pass')";
 $query_conn=mysqli_query($connection,$query);
  if(!$query_conn)
  {
    echo "insert failed".mysqli_error();
  }
```

# READING(select) from database from FORM:

FETCH : mean extract data . 

```php
$connection=mysqli_connect("localhost","root","roottoor","chics_data");
 $query="select * from user" ;
 $query_conn=mysqli_query($connection,$query);
  if(!$query_conn)
  {
    echo "query failed".mysqli_error();
  }
  while($row=mysqli_fetch_row($query_conn ))
   {
    print_r($row)
;
```

# coordinate ur code:

- **include function** : The `include()` statement takes all the text/code/markup that exists in the specified file and copies it into
the file that uses the include statement.——> (<?PHP include ”   ”;?>)
- so you will be able to  make your code more simple and short when u divide each function in a file and get it in your specific code you want by include() function .
- **NOTE** : when you make a function in a file and you want it in another file by include function you should make this  function global to run in a code in another file.

 

# PHP and The Web :

## SUPERGLOBAL variable : must be capital letter

- $GLOBALS :
- $_SERVER :
- $_REQUEST:
- **$_POST** :  $_POST is a PHP super global variable which is used to collect form data after submitting an HTML form with method="post". $_POST is also widely used to pass variables.
- $_GET :
- $_FILES
- $_ENV
- $_COOKIE :
- $_SESSION

## MAKE COOKIES:

```php
//set_cookie
$username="bassel";
$value=1000;
$expire=time()+(60*60*24*7);

setcookie($username,$value,$expire);

//reading cookies 
if(isset($_COOKIE["bassel"]))  // make sure that there is value=bassel in cookie
{
$name= $_COOKIE["bassel"];// here he put a value of cookie to print it , it will be 1000
echo $name;
}
else{
echo "invalid";
}
```

# MAKE A SESSION :

```php
//make sure that you write {"session_start()"} firstly before html code or anything will 
//be output before it.
//session1.php
<?php
session_start();
$_SESSION['name']="bassel"

// and here i want to print session value in another page
//session2.php 
<?php
session_start();

echo"hello lord ". $_SESSION['name'];
```
