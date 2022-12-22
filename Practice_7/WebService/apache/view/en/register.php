<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<h3>
    Registration
</h3>
<form action="vendor/signup.php" method="POST" enctype="multipart/form-data">
    <label>Create username</label>
    <input type="text" name="login" placeholder="Введите логин">

    <label>Create password</label>
    <input type="password" name="password" placeholder="Введите пароль">

    <label>Profile image</label>
    <input type="file" name="avatar">

    <button type="submit">To register</button>
    <p>Already have an account? <a href="http://localhost:80/index.php">Log in!</a></p>
</form>
</body>
</html>