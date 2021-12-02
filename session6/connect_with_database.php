<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_NAME', 'session6');
define('DB_USER', 'mojahed'); // root
define('DB_PASSWORD', 'mrx'); // ''

$connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
// $connection = new PDO("mysql:host=localhost;dbname=session6", 'root', '');

$query = $connection->prepare('SELECT * FROM users;');
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($users);
