<?php
session_start();
require_once '../connect.php';
$login = $_POST['login'];
// $password = md5($_POST['password']);
$password = $_POST['password'];

echo $password;
// $check_user = mysqli_query($connect, "SELECT * FROM auth_users WHERE login_user = '$login' AND password_user = '$password'");
$check_user = mysqli_query($connect, "select * from auth_users where login_user = '$login' and password_user = '$password'");
if(mysqli_num_rows($check_user) > 0){

}
else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}