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

function isPostAndValid()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['url']);
}

function storePost($args)
{
    if (isset($args['title']) && isset($args['description']) && isset($args['category'])) {
        global $connection;

        $sql = "INSERT INTO posts (category_id, title, description, posted_by) VALUES ( ";
        $sql.= "'{$args['category']}',";
        $sql.= "'{$args['title']}',";
        $sql.= "'{$args['description']}',";
        $sql.= "1";
        $sql.= ")";

        $query = $connection->prepare($sql);

        if ($query->execute()) {
            $response = [
                'status' => 'success'
            ];
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'Unable to execute query!',
            ];
        }

        return json_encode($response);
    } else {
        $response = [
            'status' => 'failed',
            'message' => 'Required filed is missing!',
        ];
        return json_encode($response);
    }
}
