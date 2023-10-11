@extends('dashboard-layout')

@push('genre_page')
    @vite('/resources/js/genres/genre_page.js')
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

    {{-- create publisher form --}}
    <form class="px-4 py-3 bg-white shadow-md w-full " action="{{ route('genre_create') }}" method="POST">
        @csrf
        @method('post')
        <h2 class="font-semibold mb-2">Cadastrar nova categoria</h2>
        <div class="flex items-end justify-center gap-2">
            <div class="flex-1 flex flex-col">
                <label class="text-sm leading-none mb-2" for='name' >Nome da categoria:</label>
                <input placeholder="Digite o nome da categoria..." class="border h-9 px-4 text-sm" type="text" name="name" id="name" >
            </div>
            <input title="cadastrar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer"  type="submit" value="Cadastrar">
        </div>
        
    </form>

    {{-- genre list --}}
    <div class="mt-2">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold">Categorias</h2>

            {{-- search --}}
            <div>
                <form class="search_genres_form bg-white shadow-md px-1 h-7 flex items-center justify-center rounded-sm text-sm min-w-[200px]" action="">
                    <input  class="search_input flex-1 outline-none px-1" type="text" placeholder="Buscar categoria">
                    <button title="buscar" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                    </button>
                </form>
            </div>

            @if ($genres->count()>0)
                <span class="text-sm text-gray-600 mr-1">
                    {{$genres->count()}} 
                    @if ($genres->count() > 1)
                     categorias
                    @else
                     categoria
                    @endif
                </span>
            @endif
        </div>

        <div class="mt-2 p-4 bg-white shadow-md">
            @if($genres->count() > 0)
                <table class="border w-full text-sm">
                    <thead>
                        <th class="border">ID</th>
                        <th class="border">Nome</th>
                        <th class="border">Livros</th>
                    </thead>
                    <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                        @foreach ($genres as $genre)
                            <tr >
                                <td class="border px-2 text-center">{{$genre->id}}</td>
                                <td class="border px-2">{{$genre->name}}</td>
                                <td class="border px-2 text-center">{{$genre->books->count()}}</td>
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
                    Nenhuma categoria cadastrada até o momento
                </div>
                @endif
            @endif
        </div>
    </div>
</section>
    
@endsection