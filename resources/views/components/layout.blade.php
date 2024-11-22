<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota - Write, Share, Connect</title>
    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body>
    <x-navbar></x-navbar>
    {{ $slot }}
    <x-footer></x-footer>
</body>

</html>
