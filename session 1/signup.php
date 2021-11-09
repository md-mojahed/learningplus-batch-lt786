<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Signup</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="row w-75" style="margin:100px auto">
            <?php
                if (isset($_POST['email'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $mobile = $_POST['mobile'];
                    $age = $_POST['age'];
                    $password = $_POST['password'];

                    $jsonFile = file_get_contents('files/users.json');
                    $users = json_decode($jsonFile, true);

                    $userArray = [
                        'name' => $name,
                        'email' => $email,
                        'age' => $age,
                        'mobile' => $mobile,
                        'password' => sha1($password)
                    ];

                    $userExists = array_filter(
                        $users,
                        function ($user) use ($email) {
                            return $user['email'] == $email;
                        }
                    );

                    if (count($userExists) > 0) {
                        echo "<p class='alert alert-danger'>User already exists!</p>";
                    } else {
                        array_push($users, $userArray);
                        $jsonData = json_encode($users);
                        file_put_contents('files/users.json', $jsonData);

                        echo "<p class='alert alert-success'>Successfully Added!</p>";
                    }
                }
            ?>
            <form class="form" action="signup.php" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="name" type="text" name="name" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="email" type="email" name="email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="age" type="number" min="10" name="age" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="mobile" type="text" name="mobile" required>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="password" type="password" min="6" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="button">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
