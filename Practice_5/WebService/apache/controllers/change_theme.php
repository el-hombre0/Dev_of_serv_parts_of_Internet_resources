<?php
session_start();
$_SESSION["theme"] = $_GET["theme"];
header('Location: ../'.$_SESSION['path']);
