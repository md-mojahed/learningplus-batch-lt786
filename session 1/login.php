<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="row w-75" style="margin:100px auto">
            <?php
                require('functions.php');

                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $jsonFile = file_get_contents('files/users.json');
                    $users = json_decode($jsonFile, true);

                    $userExists = array_filter(
                        $users,
                        function ($user) use ($email, $password) {
                            return $user['email'] == $email && $user['password'] === sha1($password);
                        }
                    );

                    if (count($userExists) > 0) {
                        $user = array_values($userExists)[0];

                        echo "<p class='alert alert-success'>Successfully LoggedIn</p>";
                        echo <<<EOF
                                <ul>
                                    <li> Name : {$user['name']} </li>
                                    <li> Email : {$user['email']} </li>
                                    <li> Mobile : {$user['mobile']} </li>
                                </ul>
                            EOF;
                        die;
                    } else {
                        echo "<p class='alert alert-danger'>Credentials not matched!</p>";
                    }
                }
            ?>
            <form class="form" action="login.php" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="email" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="password" type="password" min="6" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>
