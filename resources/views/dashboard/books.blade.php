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
    <form class="book_form px-4 py-3 bg-white shadow-md w-full " action="{{ route('book_create') }}"  method="POST" enctype="multipart/form-data">
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
            <div class="relative" >
                <button type="button" title="remover imagem" class="remove_image absolute text-xs w-full -top-4 text-red-500 hover:underline hidden">remover imagem</button>
                <label class="label relative h-40 w-28 border-2 flex cursor-pointer overflow-hidden" for='image' >
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
                    <label class="text-sm leading-none" for='title' >Título do livro:</label>
                    <input placeholder="Digite o título do livro..." class="border h-9 px-4 text-sm w-full" type="text" name="title" id="title" >
                </div>
                {{-- description --}}
                <div >
                    <label class="text-sm leading-none" for='description' >Descrição do livro:</label>
                    <textarea placeholder="Digite a descrição do livro..." class="border py-2 px-4 text-sm w-full min-h-[50px]" type="text" name="description" id="description" ></textarea>
                </div>
            </div>
        </div>
            
            
            
            <div class="flex gap-2 items-end">
                {{-- ISBN code --}}
                <div class=" flex-1">
                    <label class="text-sm leading-none mb-1" for='ISBN' >ISBN:</label>
                    <input placeholder="Digite código ISBN..." class="border h-9 px-4 text-sm w-full" type="number" name="ISBN" id="ISBN" >
                </div>
                {{-- published date --}}
                <div class="flex flex-col flex-1">
                    <label class="text-sm leading-none mb-1" for="published_date">Data de publicação</label>
                    <input class="h-9 px-4 border" type="date" name="published_date" id="published_date">
                </div>
            </div>
            

            <div class="my-2 flex items-center gap-1">
                {{-- pages --}}
                <div class="flex flex-col flex-1">
                    <label class="text-sm leading-none mb-2" for='pages' >Número de páginas:</label>
                    <input placeholder="Número de páginas..." class="border h-9 px-4 text-sm" type="number" name="pages" id="pages" >
                </div>
                {{-- Avaliação --}}
                <div class="flex flex-col flex-1">
                    <label class="text-sm leading-none mb-2" for='rating' >Avaliação:</label>
                    <input placeholder="Avaliação 1 - 5..." class="border h-9 px-4 text-sm" type="number" name="rating" id="rating" max="5" min="0" step=".10" >
                </div>
                {{-- Quantity --}}
                <div class="flex flex-col flex-1">
                    <label class="text-sm leading-none mb-2" for='quantity' >Quantidade:</label>
                    <input placeholder="Quantidade de cópias..." class="border h-9 px-4 text-sm" type="number" name="quantity" id="quantity" min="0" >
                </div>
            </div>

            <div class="text-sm flex items-center gap-1 mb-2">
                <div class="flex flex-col flex-1">
                    {{-- author select --}}
                    <label for="author_id">Autor do livro:</label>
                    <select class="cursor-pointer border h-9 px-2" name="author_id" id="author_id" title="Escolher autor">
                        <option class="opacity-30" disabled selected value={{null}}>Escolher autor</option>
                        @foreach ($authors as $author )
                            <option value={{$author->id}}>{{$author->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col flex-1">
                    {{-- author select --}}
                    <label for="publisher_id">Editora do livro:</label>
                    <select class="cursor-pointer border h-9 px-2" name="publisher_id" id="publisher_id" title="Escolher editora">
                        <option class="opacity-30" disabled selected value={{null}}>Escolher editora</option>
                        @foreach ($publishers as $publisher )
                            <option value={{$publisher->id}}>{{$publisher->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col flex-1">
                    {{-- author select --}}
                    <label for="genre_id">Categoria do livro:</label>
                    <select class="cursor-pointer border h-9 px-2" name="genre_id" id="genre_id" title="Escolher categoria">
                        <option class="opacity-30" disabled selected value={{null}}>Escolher categoria</option>
                        @foreach ($genres as $genre )
                            <option value={{$genre->id}}>{{$genre->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
          

            {{-- submit btn --}}
            <input title="cadastrar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto"  type="submit" value="Cadastrar">
        </div>
    </form>
    
    {{-- book list --}}
    <div class="mt-2">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold">Livros</h2>


            {{-- search --}}
            <x-search-bar :placeholder="'Buscar livro'" />
           
            <span class="text-sm text-gray-600 mr-1">
                  {{$books->count()}} 
                  @if ($books->count() > 1 || $books->count() == 0)
                    livros
                  @else
                   livro
                  @endif
            </span>
        </div>

        <div class="mt-2 p-4 bg-white shadow-md">
            @if($books->count() > 0)
                <table class="border w-full text-sm">
                    <thead>
                        <th class="border ">ID</th>
                        <th class="border ">Capa</th>
                        <th class="border ">Nome</th>
                        <th class="border ">Autor</th>
                        <th class="border ">Cópias Disponíveis</th>
                    </thead>
                    <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                        @foreach ($books as $book)
                            <tr >
                                <td class="border px-2 text-center">{{$book->id}}</td>
                                <td class=" px-2 overflow-hidden flex items-center justify-center ">
                                    <img class="w-11 block" src="{{asset('/assets/images/books/' . $book->image)}}" alt="capa do livro">
                                </td>
                                <td class="border  px-2">{{$book->title}}</td>                               
                                <td class="border  px-2 text-center">{{$book->author->name}}</td>
                                <td class="border  px-2 text-center">{{$book->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            @else
                @if(request()->query(('search')))
                <div class="w-full h-20 flex items-center justify-center text-gray-500">
                    Nunhum resultado encontrado
                </div>
                @else
                    <div class="w-full h-20 flex items-center justify-center text-gray-500">
                        Nunhum livro cadastrado até o momento
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
    
@endsection