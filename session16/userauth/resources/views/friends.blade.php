<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Friends</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <center>
            <h1>Friends</h1>
        </center>
        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Pocket Money</th>
                    <th>Courses</th>
                </tr>
            </thead>
            <tbody>
                @foreach($friends as $friend)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <th>{{ $friend->name }}</th>
                    <th>{{ $friend->age }}</th>
                    <th>{{ $friend->pocket_money }}</th>
                    <th>
                        @foreach($friend->courses as $course)
                            * {{ $course->name }} <br>
                        @endforeach
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
