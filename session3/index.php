<?php
    $users = require('users.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Session 3</title>
        <script>window.users = <?= json_encode($users) ?>;</script>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12" id="table-container">
                    <table id="table" class="table table-bordered table-dark table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="table-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal w-50 m-5" id="form-modal">
            <div class="bg-light p-5 text-center">
                <input type="hidden" id="username-input">
                <input type="text" class="form-control" id="name-input">
                <input type="text" class="form-control" id="mobile-input">
                <button class="btn btn-success" id="btn-save">Save</button>
            </div>
        </div>
    </body>
</html>
