<?php

function getUsers()
{
    return json_decode(
        file_get_contents('assets/files/users.json'),
        true
    );
}

function getUser($email)
{
    $users = getUsers();
    $user = array_values(
        array_filter($users, function ($u) use ($email) {
            return $u['email'] == $email;
        })
    );

    if (count($user) > 0) {
        return $user[0];
    }

    return false;
}
