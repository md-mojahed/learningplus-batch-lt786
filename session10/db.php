<?php

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_NAME', 'blog_db');
define('DB_USER', 'mojahed'); // root
define('DB_PASSWORD', 'mrx'); // ''

$connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
