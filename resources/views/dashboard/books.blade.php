@extends('dashboard-layout')


@push('book_page')
    @vite('/resources/js/books/book_page.js')
@endpush

@push('search_bar')
  @vite('resources/js/components/searchBar.js')
@endpush


@section('content')

<section class="w-full">

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

    {{-- create book form --}}
    <form class="book_form px-4 py-3 bg-white shadow-md w-full text-sm" action="{{ route('book_create') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <h2 title="cadastrar novo livro" class="add_new_book flex items-center justify-between cursor-pointer">
           <span class="font-semibold">Cadastrar novo livro</span>

           <button type="button" class="btn_arrow transition-all duration-500 text-gray-400 w-fit max-w-fit origin-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
           </button>
        </h2>

        {{-- Fields container --}}
        <div class="max-h-0 overflow-hidden transition-all duration-500 form_container">
        <div class="flex items-start justify-start gap-2 mt-4">
            {{-- image --}}
            <div class="relative h-40 w-28 border" >
                <button type="button" title="remover imagem" class="remove_image absolute text-xs w-full -top-4 text-red-500 hover:underline hidden">remover imagem</button>
                <label  class="label relative h-40 w-28 flex cursor-pointer overflow-hidden" for='image' >
                    <div title="adicionar capa" class="absolute flex items-center justify-center flex-col text-gray-300 w-full h-full z-10">
                        <span class="text-4xl">+</span>
                        <span class="text-sm">Adicionar capa</span>
                    </div>

                    <div class="display relative w-full h-full hidden z-50">
                       
                    </div>
                </label>
                <input placeholder="Digite URL da imagem..." class="hidden image_input" type="file" name="image" id="image" >
            </div>

            <div class="flex-1">
                {{-- title --}}
                <div >
                    <label class="font-medium text-xs" class="text-sm leading-none" for='title' >Título do livro:</label>
                    <input placeholder="Digite o título do livro..." class="border h-9 px-4 text-sm w-full" type="text" name="title" id="title" >
                </div>
                {{-- description --}}
                <div >
                    <label class="font-medium text-xs" class="text-sm leading-none" for='description' >Descrição do livro:</label>
                    <textarea placeholder="Digite a descrição do livro..." class="border py-2 px-4 text-sm w-full min-h-[50px]" type="text" name="description" spellcheck=false id="description" ></textarea>
                </div>
            </div>
        </div>
            
            
            
            <div class="flex flex-col gap-2 items-end lg:flex-row">
                {{-- ISBN code --}}
                <div class="lg:flex-1 w-full">
                    <label class="font-medium text-xs" class="text-sm leading-none mb-1" for='ISBN' >ISBN:</label>
                    <input placeholder="Digite código ISBN..." class="border h-9 px-4 text-sm w-full" type="number" name="ISBN" id="ISBN" >
                </div>
                {{-- published year --}}
                <div class="flex flex-col w-full lg:flex-1">
                    <label class="font-medium text-xs" class="text-sm leading-none mb-1" for="published_year">Ano de publicação</label>
                    <input class="h-9 px-4 border" type="number" name="published_year" id="published_year" placeholder="Digite o ano de publicação" >
                </div>
            </div>
            

            <div class="my-2 flex flex-col items-center gap-1 lg:flex-row">
                {{-- pages --}}
                <div class="flex flex-col w-full lg:flex-1 ">
                    <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='pages' >Número de páginas:</label>
                    <input placeholder="Número de páginas..." class="border h-9 px-4 text-sm" type="number" name="pages" id="pages" >
                </div>
                {{-- Avaliação --}}
                <div class="flex flex-col w-full lg:flex-1">
                    <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='rating' >Avaliação:</label>
                    <input placeholder="Avaliação 1 - 5..." class="border h-9 px-4 text-sm" type="number" name="rating" id="rating" max="5" min="0" step=".10" >
                </div>
                {{-- Quantity --}}
                <div class="flex flex-col w-full lg:flex-1">
                    <label class="font-medium text-xs" class="text-sm leading-none mb-2" for='quantity' >Quantidade:</label>
                    <input placeholder="Quantidade de cópias..." class="border h-9 px-4 text-sm" type="number" name="quantity" id="quantity" min="0" >
                </div>
            </div>

            <div >
                <div class="text-sm flex flex-col items-center gap-1 mb-2  lg:flex-row">
                    <div class="flex flex-col w-full lg:flex-1">
                        {{-- author select --}}
                        <label class="font-medium text-xs" for="author_id">Autor do livro:</label>
                        <select class="cursor-pointer border h-9 px-2" name="author_id" id="author_id" title="Escolher autor">
                            <option class="opacity-30" disabled selected value={{null}}>Escolher autor</option>
                            @foreach ($authors as $author )
                                <option value={{$author->id}}>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col w-full lg:flex-1">
                        {{-- publisher select --}}
                        <label class="font-medium text-xs" for="publisher_id">Editora do livro:</label>
                        <select class="cursor-pointer border h-9 px-2" name="publisher_id" id="publisher_id" title="Escolher editora">
                            <option class="opacity-30" disabled selected value={{null}}>Escolher editora</option>
                            @foreach ($publishers as $publisher )
                                <option value={{$publisher->id}}>{{$publisher->name}}</option>
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
            <input title="cadastrar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto mt-2"  type="submit" value="Cadastrar">
        </div>
    </form>
    
    {{-- book list --}}
    <div class="mt-2">
        <div class="grid  grid-cols-2 grid-rows-2 sm:flex sm:items-end sm:justify-between gap-2">
            <h2 class="font-semibold row-start-2 row-span-1 flex items-end justify-start">Livros</h2>


            <div class="col-span-full row-span-1 w-full sm:flex-1 sm:max-w-[400px]">
                {{-- search --}}
                <x-search-bar :placeholder="'Buscar livro...'" />
            </div>
           
            <span class="text-xs font-medium text-gray-600 mr-1 flex items-end justify-end">
                  {{$books->total()}} 
                  @if ($books->total() > 1 || $books->total() == 0)
                    livros
                  @else
                   livro
                  @endif
            </span>
        </div>

        <div class="mt-2 ">
            @if($books->total() > 0)
            <div>
                <div class="grid auto-rows-max grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    @foreach ($books as $book)
                    {{-- display each book --}}
                        <x-book-item :book="$book" />
                    @endforeach
                </div> 
                  {{-- Pagination --}}
                <div>
                    {{$books->links()}}    
                </div> 
            </div>                             
            @else
                @if(request()->query(('search')))
                <div class="w-full bg-white h-20 flex items-center justify-center text-gray-500">
                    Nunhum resultado encontrado
                </div>
                @else
                    <div class="w-full bg-white h-20 flex items-center justify-center text-gray-500">
                        Nunhum livro cadastrado até o momento
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
    
@endsection