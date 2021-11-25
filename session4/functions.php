<?php

function getUsers()
{
    return json_decode(
        file_get_contents('assets/files/users.json'),
        true
    );
}

function setUsers($usersArray)
{
    file_put_contents('assets/files/users.json', json_encode($usersArray));
}

function getUser($id)
{
    $users = getUsers();
    $user = array_values(
        array_filter($users, function ($u) use ($id) {
            return $u['id'] == $id;
        })
    )[0];

    return $user;
}

function setUser($id, $newDataArray)
{
    $user = getUser($id);
    $users = getUsers();
    $updatedUser = array_merge($user, $newDataArray);

    for ($i=0; $i < count($users); $i++) {
        if ($users[$i]['id'] == $id) {
            $users[$i] = $updatedUser;
            break;
        }
    }

    setUsers($users);
}

function deleteUser($id)
{
    $users = getUsers();
    $updatedUsers = array_values(
        array_filter($users, function ($u) use ($id) {
            return $u['id'] != $id;
        })
    );

    setUsers($updatedUsers);
}
