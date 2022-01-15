<?php

function env($key)
{
    $fname = 'env.json';

    if (!file_exists($fname)) {
        die("Error : Environment setup failed!");
    }

    $env = json_decode(
        file_get_contents($fname),
        true
    );

    if (is_array($key)) {
        $temp = [];

        foreach ($key as $value) {
            $temp[] = isset($env[$value]) ? $env[$value] : '';
        }
        return $temp;
    }
    return isset($env[$key]) ? $env[$key] : '';
}
