<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['users'])) {
    echo json_encode(
        getUsers()
    );
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['user'])) {
    echo json_encode(
        getUser(
            $_GET['user']
        )
    );
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user']) && isset($_POST['status'])) {
    $userData = [ 'status' => $_POST['status']];
    setUser($_POST['user'], $userData);
    echo 'ok';
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user']) && isset($_POST['data'])) {
    $userData = $_POST['data'];
    setUser($_POST['user'], $userData);
    echo 'ok';
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user']) && isset($_POST['delete'])) {
    deleteUser($_POST['user']);
    echo 'ok';
} else {
    echo "Bad Gateway";
}
