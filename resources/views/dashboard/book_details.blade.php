<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librarian | {{$book->title}}</title>

     {{-- tab icon --}}
     <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

     {{-- Load tailwindcss --}}
     @vite('resources/css/app.css')
 
     {{-- Load js --}}
    @vite('resources/js/app.js')
    @vite('resources/js/books/book_rating.js')

</head>
<body class="bg-gray-100 font-montserrat  p-4 w-full max-w-7xl m-auto">
    <header>
        <a class="text-sm hover:text-orange-500 transition-all duration-200" title="voltar" href="javascript:history.back()">Voltar</a>
    </header>
  <section class="">
   
    <div class="p-4">
    <h1 class="sm:text-lg font-semibold">{{$book->title}}</h1>
    <div class="text-xs sm:text-sm sm:flex-row flex flex-col sm:items-center justify-start sm:gap-2">
        <p>{{$book->author->name}}</p>
        <span class="sm:w-1 sm:h-1 bg-black rounded-full"></span>
        <p>{{$book->publisher->name}}</p>
    </div>

   </div>
    
    <div class="bg-white p-4 shadow-md">
        <h2 class="font-semibold text-lg mb-2 ml-2">Detalhes do livro</h2>
        <div class="flex flex-col sm:flex-row gap-4">

            <div class="max-w-[250px] m-auto sm:min-w-[250px] overflow-hidden rounded-md sm:flex-1">
                <img class="w-full block" src="{{asset("/assets/images/books/" . $book->image)}}" alt="book-image">
            </div>

            <div>
               
                <div class="mb-1">
                    <span class="text-sm font-medium">Data de Publicação:</span>
                    <span class="font-medium">{{$book->published_date}}</span>
                </div>
        
                
        
                <div class="text-sm mb-1">
                    <p>{{$book->pages}} páginas</p>
                </div>
        
                <div class="mb-1">
                    <span class="text-sm font-medium">Quantidade de Cópias:</span>
                    <span class="font-medium"> {{$book->quantity}}</span>
                </div>
               
            
                <div class="mb-1">
                    <p class="text-sm font-medium">Avaliação:</p>
                    <x-rating :rating="$book->rating" />
                </div>
            
                <div class="mb-1">
                    <p class="text-sm font-medium">Descrição:</p>
                    <div class="text-sm">
                        {{$book->description}}
                    </div>
                </div>

                <div class="mb-1">
                    <p class="text-sm font-medium">Categorias:</p>
                    @foreach ($book->genres as $genre )
                        <span class="text-xs inline-block px-1 font-medium bg-orange-200 rounded-sm">{{$genre->name}}</span>
                    @endforeach
                </div>
            </div>
            </div>
           
       
    </div>
    



  </section>
</body>
</html>