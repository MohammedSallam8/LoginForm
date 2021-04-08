<?php
session_start();
$username = "";
$email    = "";
$errors = array();
$db = mysqli_connect('localhost','root','', 'mydb');
if (isset($_POST['reg_user'])){
  $username = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($username)){ array_push(errors, "Username is requierd");}
  if (empty($email)){ array_push(errors, "Email is requierd");}
  if (empty($password_1)){ array_push(errors, "Password is requierd");}
  if (empty($password_2)){ array_push(errors, "Password is requierd");}
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwordw do not match");
  }
  $user_check_query = "Select * from users where fullname='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    if ($user['fullname'] === $username) {
      array_push($errors, "Username already exists");
      }
      if ($user['email'] === $username) {
        array_push($errors, "Email already exists");
        }
    }
    if (count($errors) == 0){
      $password = md5($password_1);

      $query = "Insert into users(fullname, email, password)
                VAIUES('$username', '$email', '$password')";
                mysqli_query($db, $query);
                header('location: login.html');
    }
}
?>