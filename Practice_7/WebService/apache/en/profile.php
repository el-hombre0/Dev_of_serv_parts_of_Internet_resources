<?php
session_start();
if(!$_SESSION['user']){
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h3>Menu</h3>
    <ul>
        <li><a href="http://localhost:8080/index.html">Main page</a></li>
        <li><a href="http://localhost:8080/second.html">Our features</a></li>
        <li><a href="http://localhost:80/index.php">Our projects</a></li>
    </ul>
    <form>
        <img src="<?= $_SESSION['user']['avatar'] ?>" width="100" alt="Фото профиля">
        <h2>Login: <?= $_SESSION['user']['login_user'] ?></h2>
        <h3>Name: <?= $_SESSION['user']['name_user'] ?></h3>
        <button> 
        <a href="./vendor/downloadFile.php">Download your resume</a>
        </button>
        <a href="./vendor/logout.php">Exit</a>
    </form>

    <h4>Upload your resume:</h4>
       
    <form action="./upload_resume.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="Send">
        <?php
        require_once './upload_resume.php';
        

		if (!empty($success)) {
			echo '<p>' . $success . '</p>';	
		} else {
			echo '<p>' . $error . '</p>';
		}
        ?>
    </form>
    
</body>
</html>