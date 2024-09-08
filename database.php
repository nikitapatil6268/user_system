<?php
$host = 'localhost'; // Change this to your database host
$db = 'user_system';
$user = 'root'; // Change this to your database username
$pass = ''; // Change this to your database password

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>