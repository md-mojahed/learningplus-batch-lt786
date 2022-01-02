<?php
require 'helpers.php';

function isPostAndValid()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['url']);
}

function GetFileSize($file, $as='kb')
{
    if ($as == 'gb') {
        return $file['size'] / 1000000000;
    } elseif ($as == 'mb') {
        return $file['size'] / 1000000;
    } elseif ($as == 'kb') {
        return $file['size'] / 1000;
    } else {
        return $file['size'];
    }
}

function imageUpload($file_name, $destination)
{
    $file = $_FILES[$file_name];
    $extension = trim(explode('/', $file['type'])[1]);
    $temDir = $file['tmp_name'];
    $name = $file['name'];
    $size = GetFileSize($file);
    $path = $destination.'/'.$name.$extension;

    if (move_uploaded_file($temDir, $path)) {
        return $path;
    }
    return false;
}

function login($args)
{
    if (isset($args['email']) && isset($args['password'])) {
        $user = getUser($args['email']);

        if ($user != false) {
            if ($user['password'] == sha1($args['password'])) {
                sessionSet('email', $args['email']);
                sessionSet('user', json_encode($user));
                $response = [
                    'status' => 'success',
                    'user' => $user
                ];
                return json_encode($response);
            } else {
                $response = [
                    'status' => 'failed',
                    'message' => 'Invalid credentials!',
                ];
                return json_encode($response);
            }
        } else {
            $response = [
                'status' => 'failed',
                'message' => 'User not found!',
            ];
            return json_encode($response);
        }
    } else {
        $response = [
            'status' => 'failed',
            'message' => 'Required filed is missing!',
        ];
        return json_encode($response);
    }
}

function logout()
{
    if (sessionHas('email')) {
        sessionForget('email');
        sessionForget('user');
    }

    $response = [
        'status' => 'success',
        'message' => 'Successfull'
    ];

    return json_encode($response);
}

function authCheck()
{
    return sessionHas('email');
}

function redirectIfAuthenticated()
{
    if (authCheck()) {
        header('Location:index.php');
    }
}

function redirectIfNotAuthenticated()
{
    if (!authCheck()) {
        header('Location:login.php');
    }
}

function authData()
{
    return json_encode([
        'status' => 'success',
        'data' => sessionGet('user')
    ]);
}
