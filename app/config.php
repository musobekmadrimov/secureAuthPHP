<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connection = new PDO('mysql:host=localhost; dbname=secureauthphp', 'root', '');

$stmt = $connection->prepare("SELECT * FROM users;");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
   # echo $row['user_username'];
}

?>