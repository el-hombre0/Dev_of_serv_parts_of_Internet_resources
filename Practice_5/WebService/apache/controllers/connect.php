<?php
$connect = new mysqli("db_mysql", "user", "password", "portfolioDB");
if (!$connect){
    die('Error connect to Database');
}