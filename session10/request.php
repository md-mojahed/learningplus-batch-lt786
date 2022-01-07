<?php
require 'functions.php';

if (isPostAndValid()) {
    switch ($_POST['url']) {
        case '/store-post':
            header('Content-Type: application/json');
            echo storePost($_POST);
            break;
        default:
            // code...
            break;
    }
} else {
    echo "Bad gateway";
    die;
}
