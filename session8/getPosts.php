<?php


require 'db.php';

$sql = "SELECT
    p.*, c.name as category_name, u.name as user_name, u.id as user_id
FROM posts p
JOIN users u
    ON u.id = p.posted_by
JOIN categories c
    ON c.id = p.category_id";


$query = $connection->prepare($sql);
$query->execute();
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

return $posts;
