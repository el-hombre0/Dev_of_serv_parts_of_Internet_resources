<?php
session_start();
require_once '../../controllers/connect.php';

$login = $_POST['login'];
$password = $_POST['password'];


$_FILES['avatar']['name'];
$path = '../../uploads/avatars/' . time() . $_FILES['avatar']['name'];
if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
    $_SESSION['message'] = 'Error in file downloading.';
    header('Location: ../register.php');
}

$password = md5($password);
mysqli_query($connect, "INSERT INTO auth_users (login_user, password_user, avatar) VALUES ('$login', '$password', '$path')");
$_SESSION['message'] = 'Success registration.';
header('Location: ../index.php');

