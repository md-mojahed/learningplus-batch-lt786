<?php
session_start();

function sessionHas($key)
{
    return isset($_SESSION[$key]);
}

function sessionSet($key, $value)
{
    $_SESSION[$key] = $value;
}

function sessionGet($key)
{
    return $_SESSION[$key];
}

function sessionForget($key)
{
    if (sessionHas($key)) {
        unset($_SESSION[$key]);
    }
}
