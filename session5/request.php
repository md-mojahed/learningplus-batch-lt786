<?php
require 'session.php';
require 'functions.php';

if (isPostAndValid()) {
    switch ($_POST['url']) {
        case '/login':
            echo login($_POST);
            break;
        case '/logout':
            echo logout();
            break;
        case '/authData':
            echo authData();
            break;

        default:
            // code...
            break;
    }
} else {
    echo "Bad gateway";
    die;
}
