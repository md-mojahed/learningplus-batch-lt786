<?php

$filePath = 'assets/files/users.json';
$users = json_decode(file_get_contents($filePath), true);

return $users;
