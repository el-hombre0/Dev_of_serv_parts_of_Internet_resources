<?php
session_start();
$_SESSION["lang"] = $_GET["lang"];
if ($_GET["lang"] == "en") {
    $new_url = "http://localhost:80/en/index.php";
} elseif ($_GET["lang"] == "ru") {
    $new_url = "http://localhost:80/ru/index.php";
}
header('Location: ' . $new_url);
