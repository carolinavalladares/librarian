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
    @vite('resources/js/books/book_edit_form.js')

</head>

<body class="bg-gray-100 font-montserrat  p-4 w-full max-w-7xl m-auto">

    <header>
        <a class="flex items-center text-sm hover:text-orange-500 transition-all duration-200" title="voltar" href="/dashboard/books">
            <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down rotate-90"><path d="m6 9 6 6 6-6"/></svg>
            Voltar
        </a>
    </header>

  <section>  
   
    <div class="p-4">
    <h1 class="sm:text-lg font-semibold">{{$book->title}}</h1>
    <div class="text-xs sm:text-sm sm:flex-row flex flex-col sm:items-center justify-start sm:gap-2">
        <p>{{$book->author->name}}</p>
        <span class="sm:w-1 sm:h-1 bg-black rounded-full"></span>
        <p>{{$book->publisher->name}}</p>
    </div>
   </div>

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


   <div class="bg-white shadow-md  mb-2">
        <div class="toggle-form p-4 font-semibold flex items-center justify-between cursor-pointer">
            <span>Editar livro</span>
            <button class="btn_arrow transition-all duration-500 text-gray-400 w-fit max-w-fit origin-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
            </button>
            
        </div>

        <div class="form_container max-h-0 overflow-hidden transition-all duration-500  ">
            <form class="px-4 pb-4" action="{{ route('edit_book', ['book'=>$book]) }}" method="POST">
                @csrf
                @method('post')
                {{-- title --}}
                <div >
                    <label class="font-medium text-xs" class="text-sm leading-none" for='title' >Título do livro:</label>
                    <input placeholder="Digite o título do livro..." class="border h-9 px-4 text-sm w-full" type="text" name="title" value="{{$book->title}}" id="title" >
                </div>
                {{-- description --}}
                <div >
                    <label class="font-medium text-xs" class="text-sm leading-none" for='description' >Descrição do livro:</label>
                    <textarea placeholder="Digite a descrição do livro..." class="border py-2 px-4 text-sm w-full min-h-[50px]" type="text" name="description" id="description" spellcheck=false >{{$book->description}}</textarea>
                </div>
                <div class="flex flex-col gap-2 items-end lg:flex-row">
                    {{-- ISBN code --}}
                    <div class="lg:flex-1 w-full">
                        <label class="font-medium text-xs" class="text-sm leading-none mb-1" for='ISBN' >ISBN:</label>
                        <input value="{{$book->ISBN}}" placeholder="Digite código ISBN..." class="border h-9 px-4 text-sm w-full" type="number" name="ISBN" id="ISBN" >
                    </div>
                    {{-- published date --}}
                    <div class="flex flex-col w-full lg:flex-1">
                        <label class="font-medium text-xs" class="text-sm leading-none mb-1" for="published_date">Data de publicação</label>
                        <input data-date="{{$book->published_date}}" class="date_input h-9 px-4 border" type="date" name="published_date" id="published_date">
                    </div>
                </div>
                <div class="my-2 flex flex-col items-center gap-1 lg:flex-row">
                    {{-- pages --}}
                    <div class="flex flex-col w-full lg:flex-1 ">
                        <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='pages' >Número de páginas:</label>
                        <input value="{{$book->pages}}" placeholder="Número de páginas..." class="border h-9 px-4 text-sm" type="number" name="pages" id="pages" >
                    </div>
                    {{-- Avaliação --}}
                    <div class="flex flex-col w-full lg:flex-1">
                        <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='rating' >Avaliação:</label>
                        <input value={{$book->rating}} placeholder="Avaliação 1 - 5..." class="border h-9 px-4 text-sm" type="number" name="rating" id="rating" max="5" min="0" step=".10" >
                    </div>
                    {{-- Quantity --}}
                    <div class="flex flex-col w-full lg:flex-1">
                        <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='quantity' >Quantidade:</label>
                        <input value="{{$book->quantity}}" placeholder="Quantidade de cópias..." class="border h-9 px-4 text-sm" type="number" name="quantity" id="quantity" min="0" >
                    </div>
                </div>

                <div >
                    <div class="text-sm flex flex-col items-center gap-1 mb-2  lg:flex-row">
                        <div class="flex flex-col w-full lg:flex-1">
                            {{-- author select --}}
                            <label class="font-medium text-xs" for="author_id">Autor do livro:</label>
                            <select class="cursor-pointer border h-9 px-2" name="author_id" id="author_id" title="Escolher autor">
                                <option class="opacity-30" disabled  value={{null}}>Escolher autor</option>
                                @foreach ($authors as $author )
                                @if ($author->id == $book->author->id)
                                 <option selected value={{$author->id}}>{{$author->name}}</option>
                                @else
                                 <option value={{$author->id}}>{{$author->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col w-full lg:flex-1">
                            {{-- publisher select --}}
                            <label class="font-medium text-xs" for="publisher_id">Editora do livro:</label>
                            <select class="cursor-pointer border h-9 px-2" name="publisher_id" id="publisher_id" title="Escolher editora">
                                <option class="opacity-30" disabled  value={{null}}>Escolher editora</option>
                                @foreach ($publishers as $publisher )
                                @if ($publisher->id == $book->publisher->id)
                                <option selected value={{$publisher->id}}>{{$publisher->name}}</option>
                               @else
                               <option value={{$publisher->id}}>{{$publisher->name}}</option>
                               @endif
                                   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
    
                    
                    <div class="flex flex-col w-full lg:flex-1">
                        {{-- genre select --}}
                        <fieldset> 
                            <div class="flex items-center justify-between border-b my-2">
                                <legend class="text-xs font-medium">Categorias do livro:</legend>             
                                
                            </div>     
                            <div class="max-h-72 w-full overflow-y-auto">
                                @if($genres->count()> 0)
                                
                                    @foreach ($genres as $genre)
                                    
                                        <div class="input_container flex items-center justify-start gap-1 mb-1 mr-1">
                                            
                                            <label class="checkbox-label text-xs  font-medium flex gap-2 items-center border px-2 cursor-pointer h-9 w-full rounded-sm" for="{{$genre->id}}">
                                               
                                                @if (in_array($genre->id, $book->genres->pluck('id')->toArray()))
                                                <input checked class="hidden  book_checkbox" type="checkbox" value="{{$genre->id}}" name="genres[]" id="{{$genre->id}}">
                                                @else
                                                <input class="hidden  book_checkbox" type="checkbox" value="{{$genre->id}}" name="genres[]" id="{{$genre->id}}">
                                                @endif
                                                
                                                {{-- hidden checkbox --}}
                                                <input class="hidden  book_checkbox" type="checkbox" value="{{$genre->id}}" name="genres[]" id="{{$genre->id}}">
            
                                                {{-- fake checkbox --}}
                                            <div class="fake-checkbox h-4 w-4 flex items-center justify-center text-white border rounded-sm">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><polyline points="20 6 9 17 4 12"/></svg>
                                            </div>
            
                                            {{-- book title --}}
                                            {{$genre->name}}                            
                                        </label>
                                        </div>                                    
                                    
                                    @endforeach
                                
                                @endif
                            </div>
                            </fieldset>
                    </div>
                        
                    </div>
                

                {{-- submit btn --}}
            <input title="editar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto mt-2"  type="submit" value="Editar">
            </form>
        </div>
    </div>
    
    <div class="bg-white p-4 shadow-md">
        <h2 class="font-semibold text-lg mb-2 ml-2">Detalhes do livro</h2>
        <div class="flex flex-col sm:flex-row gap-4">

            <div class="max-w-[250px] m-auto sm:max-w-none sm:min-w-[250px] overflow-hidden rounded-md ">
                <img class="w-full block sm:w-[250px]" src="{{asset("/assets/images/books/" . $book->image)}}" alt="book-image">
            </div>

            <div class="flex-1">
               
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