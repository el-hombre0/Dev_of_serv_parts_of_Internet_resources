<?php
session_start();
$_SESSION["theme"] = $_GET["theme"];
// if($_GET["theme"] == "dark"){
//     $new_css_path = "dark.css";
// }
// elseif($_GET["theme"] == "light"){

//     $new_css_path = "light.css";
// }
header('Location: ../'.$_SESSION['path']);
