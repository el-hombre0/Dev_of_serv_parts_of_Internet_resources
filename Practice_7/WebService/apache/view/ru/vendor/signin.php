<?php
session_start();
require_once '../../controllers/connect.php';
$login = $_POST['login'];
$password = $_POST['password'];

$password = md5($_POST['password']);
$check_user = mysqli_query($connect, "select * from auth_users where login_user = '$login' and password_user = '$password'");

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id_user" => $user['id_user'],
        "login_user" => $user['login_user'],
        "name_user" => $user['name_user'],
        "avatar" => $user['avatar'],
        "resume" => $user['resume']
    ];
    header('Location: ../profile.php');
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../index.php');
}