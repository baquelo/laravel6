<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 6</title>
</head>
<body>
<div>
    <h1>My site</h1>
    @can('create_user')
        <li>
            <a href="#">Create User</a>
        </li>
    @endcan
    @can('view_reports')
        <li>
            <a href="/reports">View Reports</a>
        </li>
    @endcan
</div>
</body>
</html>
