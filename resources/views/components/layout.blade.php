<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota - Write, Share, Connect</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/svg+xml">
</head>

<body>
    <x-nav></x-nav>
    {{ $slot }}
</body>

</html>
