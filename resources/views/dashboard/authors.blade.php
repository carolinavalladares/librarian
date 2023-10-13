@extends('dashboard-layout')

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

    {{-- create author form --}}
    <form class="px-4 py-3 bg-white shadow-md w-full " action="{{ route('author_create') }}" method="POST">
        @csrf
        @method('post')
        <h2 class="font-semibold mb-2">Cadastrar novo autor</h2>
        <div class="flex items-end justify-center gap-2">
            <div class="flex-1 flex flex-col">
                <label class="text-sm leading-none mb-2" for='name' >Nome do autor:</label>
                <input placeholder="Digite o nome do autor..." class="border h-9 px-4 text-sm" type="text" name="name" id="name" >
            </div>
            <input title="cadastrar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer"  type="submit" value="Cadastrar">
        </div>
        
    </form>

    {{-- author list --}}
    <div class="mt-2">
        <div class="flex items-center justify-between gap-2">
            <h2 class="font-semibold">Autores</h2>

            {{-- search --}}           
            <x-search-bar :placeholder="'Buscar autor'" />

          
                <span class="text-sm text-gray-600 mr-1">
                    {{$authors->count()}} 
                    @if ($authors->count() > 1 || $authors->count() == 0)
                     autores
                    @else
                     autor
                    @endif
                </span>
           
        </div>

        <div class="mt-2 p-4 bg-white shadow-md">
            @if($authors->count() > 0)
                <table class="border w-full text-sm">
                    <thead>
                        <th class="border">ID</th>
                        <th class="border">Nome</th>
                        <th class="border">Livros</th>
                    </thead>
                    <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                        @foreach ($authors as $author)
                            <tr >
                                <td class="border px-2 text-center">{{$author->id}}</td>
                                <td class="border px-2">{{$author->name}}</td>
                                <td class="border px-2 text-center">{{$author->books->count()}}</td>
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
                Nenhum autor cadastrado até o momento
            </div>
            @endif
            @endif
        </div>
    </div>
   </section>


    
@endsection