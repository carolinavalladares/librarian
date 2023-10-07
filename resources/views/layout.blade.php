<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librarian</title>

    {{-- tab icon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Load tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- Load js --}}
    @vite('resources/js/app.js')
</head>
    <body class="px-4 py-10">
        

        <div class="max-w-4xl m-auto">
            @yield('content')
        </div>


    </body>
</html>