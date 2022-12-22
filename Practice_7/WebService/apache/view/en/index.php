<?php
session_start();
$_SESSION['path'] = "en/index.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/<?php echo $_SESSION['theme']; ?>.css" type="text/css">
    <title>Portfolio - Our projects</title>
</head>
<body>
<h3>Menu</h3>
<ul>
    <li><a href="http://localhost:8080/index.html">About us</a></li>
    <li><a href="http://localhost:8080/second.html">Our features</a></li>
</ul>
<?php
if ($_SESSION['user']) {
    echo "<h2>Hello, " . $_SESSION['user']['login_user'] . ">Exit</a>\"";
} else {
    echo ">Log in</button>
        <p>First time here? <a href=\\";
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }

    unset($_SESSION['message']);
    echo "</form>";
}
?>

<h3>Change theme</h3>
<form action="../../controllers/change_theme.php" method="GET">
    <label>Light</label>
    <input type="radio" name="theme" value="light" checked>
    <label>Dark</label>
    <input type="radio" name="theme" value="dark">
    <input type="submit" value="Submit">
</form>
<h3>Change language</h3>
<form action="../../controllers/change_lang.php" method="GET">
    <?php
    if ($_SESSION['lang'] == "ru")
        echo "<p style=\"color: red;\">It looks like you speak russian. Would you like to change the website's 
language?</p>"
    ?>
    <label>Русский</label>
    <input type="radio" name="lang" value="ru" checked>
    <label>English</label>
    <input type="radio" name="lang" value="en">
    <input type="submit" value="Submit">
</form>

<h1>The table of the registered projects</h1>
<table>
    <tr>
        <th>Project's ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Language</th>
        <th>Description</th>
    </tr>
    <?php

    $mysqli = new mysqli("db_mysql", "user", "password", "portfolioDB");

    $result = $mysqli->query("SELECT * FROM projects");
    foreach ($result as $row) {
        echo "<tr><td>{$row['id_project']}</td><td>{$row['title_project']}</td><td>{$row['author_name']}</td>
    <td>{$row['main_lang']}</td><td>{$row['descrip']}</td></tr>";
    }
    ?>

</table>

<h1>Our professionals</h1>
<table>
    <tr>
        <th>Professional's ID</th>
        <th>Full name</th>
        <th>Date of birth</th>
        <th>Place of birth</th>
        <th>Contacts</th>
        <th>Skills</th>
        <th>Job expirience</th>
        <th>Education</th>
    </tr>
    <?php

    $mysqli = new mysqli("db_mysql", "user", "password", "portfolioDB");

    $result = $mysqli->query("SELECT * FROM pros");
    foreach ($result as $row) {
        echo "<tr><td>{$row['id_pro']}</td><td>{$row['`name`']}</td><td>{$row['birth_date']}</td>
    <td>{$row['residence_place']}</td><td>{$row['contacts']}</td><td>{$row['skills']}</td>
    <td>{$row['work_expirience']}</td><td>{$row['education']}</td></tr>";
    }
    ?>

</table>

</body>
</html>