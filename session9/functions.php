<?php
require 'db.php';

function getPosts()
{
    global $connection;

    $sql = "SELECT
        p.*, c.name as category_name, c.id as category_id, u.name as user_name, u.id as user_id
    FROM posts p
    JOIN users u
        ON u.id = p.posted_by
    JOIN categories c
        ON c.id = p.category_id";


    $query = $connection->prepare($sql);
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
}

function getCategories()
{
    global $connection;

    $sql = "SELECT * FROM categories";

    $query = $connection->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
