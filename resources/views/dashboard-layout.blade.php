<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Librarian</title>

    {{-- tab icon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Load tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- Load js --}}
    @vite('resources/js/app.js')

    {{-- navbar script --}}
    @vite('resources/js/components/admin_sidebar.js')


    {{-- page specific scripts --}}
    @stack('book_page')
    @stack('student_page')
    @stack('librarian_page')
    @stack('checkout_page')
    @stack('return_page')
    @stack('search_bar')
    

</head>
    <body class="bg-gray-100 font-montserrat flex flex-col w-full">
        <div class="flex-1 w-full  flex flex-col items-start p-4 gap-4 max-w-7xl m-auto md:flex-row">
            <x-side-bar/>

            <div class="md:flex-1 w-full">
                <div class="font-medium text-sm mb-4">
                    Olá, {{$user->name}}
                </div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>

        <x-footer/>

    </body>
</html>