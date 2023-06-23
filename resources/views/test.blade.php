<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <h1>you r loggedin</h1>
    @endauth

    @guest
        <h1>you r not logged in</h1>
    @endguest
</body>
</html>