<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librarian | {{$student->name}}</title>

    {{-- icon --}}
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

     {{-- Load tailwindcss --}}
     @vite('resources/css/app.css')
 
     {{-- Load js --}}
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 font-montserrat  p-4 w-full max-w-7xl m-auto">

    <header class="mb-4">
        <a class="flex items-center text-sm hover:text-orange-500 transition-all duration-200" title="voltar" href="{{route('students')}}">
            <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down rotate-90"><path d="m6 9 6 6 6-6"/></svg>
            Voltar
        </a>
    </header>

    {{-- validation messages --}}
    <div>
        @if (session('success'))
            <x-message :type="'success'" :message="session('success')" />
        @endif

        @if ($errors->any())

        <ul class="flex flex-col gap-1 mb-2">
            @foreach ($errors->all() as $error )
                <x-message :type="'error'" :message="$error" />
            @endforeach
        </ul>
        @endif
    </div>

    <section>
        <div class="p-4 bg-white shadow-md mt-4">
            {{-- student status --}}
            <x-status-flag :student="$student" :show-options="false" />

            {{-- student info --}}
            <h1 class="sm:text-lg font-semibold">{{$student->name}}</h1>
            <p class="text-sm">{{$student->email}}</p>
            <div class="text-sm flex items-center gap-1 mt-1">
                <span class="font-medium">Matrícula:</span>
                <span>{{trim(chunk_split($student->registration,4," "))}}</span>
            </div>

            {{-- status select --}}
            <div>
                <x-status-selector :student="$student" />
            </div>

            {{-- borrowed books --}}
            <div>
                <span class="text-sm font-medium">Livros emprestados:</span>

                <div class="flex flex-col gap-2">
                    @if ($student->borrowed_books->count() > 0)
                        @foreach ($student->borrowed_books as $book)
                        <div class="flex gap-1  border-b last-of-type:border-none py-2">
                            <div class="relative w-14">
                                <img class="w-full" src="{{asset('assets/images/books/'.$book->image)}}" alt="">
                            </div>
                            <div>
                                <p class="font-medium text-sm">{{$book->title}}</p>

                                <p class="text-xs">{{$book->author->name}}</p>

                                <p class="text-xs">{{$book->publisher->name}}</p>
                                
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-center text-xs text-gray-500">Nunhum livro emprestado no momento</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </section>


</body>
</html>