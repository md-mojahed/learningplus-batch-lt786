<?php

require 'QueryBuilder.php';

$q = new QueryBuilder();

$result = $q->create('users', ['name' => 'Sourav', 'email' => 'abc@gmail.com', 'password' => 'abdc']);

if ($result == true) {
    echo "Done";
} else {
    echo $result;
}
