<?php

require 'QueryBuilder.php';

$q = new QueryBuilder();

$result = $q->select('users', [
    "CONCAT(name, '__', email, '__', password) as data"
], [], false);

echo "<pre>";
print_r(QueryBuilder::class);die;

if ($result == true) {
    echo "Done";
} else {
    echo $result;
}
