<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/tailwindcss.js'])
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{ $slot }}

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
