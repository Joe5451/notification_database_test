<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        <div>
            Email:
            <input type="email" name="email" placeholder="test01@example.com" value="test01@example.com">
        </div>
        <div>
            Password:
            <input type="password" name="password" placeholder="test123" value="test123">
        </div>

        @csrf

        <input type="submit" value="Login">
    </form>
</body>
</html>