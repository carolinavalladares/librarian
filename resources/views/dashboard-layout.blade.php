<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard|Librarian</title>

    {{-- tab icon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Load tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- Load js --}}
    @vite('resources/js/app.js')

</head>
    <body class="bg-gray-100">
        <div class="flex items-start p-4 gap-4">
            <x-side-bar/>

            <div >
                <div class="font-medium">
                    Olá, {{$user->name}}
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>

    </body>
</html>