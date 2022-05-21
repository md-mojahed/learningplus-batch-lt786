<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Friends</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <table class="table table-bordered table-dark table-hover">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Pocket Money</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                @foreach($friends as $friend)
                <tr>
                    <th>{{ $loop->index + 1 }}</th>
                    <th>{{ $friend->name }}</th>
                    <th>{{ $friend->age }}</th>
                    <th>{{ $friend->pocket_money }}</th>
                    <th>{{ $friend->course_name }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-info" href="{{ url('/friends') }}">Visit Friends</a>
    </body>
</html>
