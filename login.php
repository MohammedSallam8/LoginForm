<?php
$link= mysqli_connect('localhost','root','');
mysqli_select_db($link,"mydb")
or die("unable to connect the database");
$email=$_POST["email"];
$password=$_POST["password"];
$result=mysqli_query($link,"select * from users where email like 'email' and password like 'password'");
$n=mysqli_num_rows($result);
if($n!=0)
{
  require('home.html');
}
else
{
  echo"error_login";
  require('login.html');
}
mysqli_close($link);
?>