<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao {{$user->name}}!</h1>
    <div>La tua registrazione è avvenuta con successo con name:{{ $user->name }} e email: {{ $user->email }}</div>
</body>
</html>