<?php
session_start();
require_once '../connect.php';
$login = $_POST['login'];
// echo '$_POST[\'password\'] = '.$_POST['password'].'<br/>';
$password = $_POST['password'];

$password = md5($_POST['password']);
// echo 'md5($_POST[\'password\']) = '.$password;
$check_user = mysqli_query($connect, "select * from auth_users where login_user = '$login' and password_user = '$password'");
// echo "Rows num is: ".mysqli_num_rows($check_user);

if(mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);
    // print_r($check_user);
    // print_r($user);
    // print_r($_SESSION);
    $_SESSION['user'] = [
        "id_user" => $user['id_user'],
        "login_user" => $user['login_user'],
        "name_user" => $user['name_user'],
        "avatar" => $user['avatar']
    ];
    header('Location: ../profile.php');
}
else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}