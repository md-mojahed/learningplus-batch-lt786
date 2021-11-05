<?php

    /***
      In this session we will learn about array and it's functions
    */

    $pageTitle = "Session 1";
    $jsonFile = file_get_contents('files/users.json');
    $usersData = json_decode($jsonFile, true);
    $filteredData = $usersData;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title><?= $pageTitle ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <center><h5>Users Table</h5></center>
        <table class="table bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredData as $user) { ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['age'] ?></td>
                        <td><?= $user['mobile'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
