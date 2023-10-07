@extends('dashboard-layout')

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

    {{-- create publisher form --}}
    <form class="book_form px-4 py-3 bg-white shadow-md w-full " action="{{ route('book_create') }}"  method="POST">
        @csrf
        @method('post')
        <h2 class="font-semibold mb-2">Cadastrar nova categoria</h2>
            {{-- image --}}
            <div >
                <label class="text-sm leading-none" for='image' >URL da imagem de capa:</label>
                <input placeholder="Digite URL da imagem..." class="border h-9 px-4 text-sm w-full" type="text" name="image" id="image" >
            </div>
            {{-- title --}}
            <div >
                <label class="text-sm leading-none" for='title' >Título do livro:</label>
                <input placeholder="Digite o título do livro..." class="border h-9 px-4 text-sm w-full" type="text" name="title" id="title" >
            </div>
            {{-- description --}}
            <div >
                <label class="text-sm leading-none" for='description' >Descrição do livro:</label>
                <textarea placeholder="Digite a descrição do livro..." class="border py-2 px-4 text-sm w-full" type="text" name="description" id="description" ></textarea>
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
     
        
    </form>
    
    {{-- book list --}}
    <div class="mt-2">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold">Livros</h2>
            @if ($books->count()>0)
                <span class="text-sm text-gray-600 mr-1">
                    {{$books->count()}} 
                    @if ($books->count() > 1)
                     livros
                    @else
                     livro
                    @endif
                </span>
            @endif
        </div>

        <div class="mt-2 p-4 bg-white shadow-md">
            @if($books->count() > 0)
                <table class="border w-full text-sm">
                    <thead>
                        <th class="border ">ID</th>
                        <th class="border ">Capa</th>
                        <th class="border ">Nome</th>
                        <th class="border ">Autor</th>
                    </thead>
                    <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                        @foreach ($books as $book)
                            <tr >
                                <td class="border px-2 text-center">{{$book->id}}</td>
                                <td class="border px-2 overflow-hidden flex items-center justify-center ">
                                    <img class="w-11 block" src="{{$book->image}}" alt="capa do livro">
                                </td>
                                <td class="border  px-2">{{$book->title}}</td>                               
                                <td class="border  px-2 text-center">{{$book->author->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            @else
                <div class="w-full h-20 flex items-center justify-center text-gray-500">
                    Nunhum livro cadastrado até o momento
                </div>
            @endif
        </div>
    </div>
</section>
    
@endsection