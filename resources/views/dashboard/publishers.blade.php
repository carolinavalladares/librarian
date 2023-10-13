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
        
            {{-- create publisher form --}}
            <form class="px-4 py-3 bg-white shadow-md w-full " action="{{ route('publisher_create') }}" method="POST">
                @csrf
                @method('post')
                <h2 class="font-semibold mb-2">Cadastrar nova editora</h2>

                <div class="flex items-end justify-center gap-2">
                    <div class="flex-1 flex flex-col">
                        <label class="text-xs font-medium leading-none mb-1" for='name' >Nome da editora:</label>
                        <input placeholder="Digite o nome da editor..." class="border h-9 px-4 text-sm" type="text" name="name" id="name" >
                    </div>
                    <input title="cadastrar" class="h-9 text-sm flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer"  type="submit" value="Cadastrar">
                </div>
                
            </form>
        
            {{-- publisher list --}}
            <div class="mt-2">
                <div class="flex items-end justify-between gap-2">
                    <h2 class="font-semibold">Editoras</h2>

                    <div class="w-full max-w-[400px]">
                        {{-- search --}}
                        <x-search-bar  :placeholder="'Buscar editora'" />
                    </div>

                  
                        <span class="text-xs font-medium text-gray-600 mr-1">
                            {{$publishers->count()}} 
                            @if ($publishers->count() > 1 || $publishers->count() == 0)
                             editoras
                            @else
                             editora
                            @endif
                        </span>
                   
                </div>
        
                <div class="mt-2 p-4 bg-white shadow-md">
                    @if($publishers->count() > 0)
                        <table class="border w-full text-sm">
                            <thead>
                                <th class="border">ID</th>
                                <th class="border">Nome</th>
                                <th class="border">Livros</th>
                            </thead>
                            <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                                @foreach ($publishers as $publisher)
                                    <tr >
                                        <td class="border px-2 text-center">{{$publisher->id}}</td>
                                        <td class="border px-2">{{$publisher->name}}</td>
                                        <td class="border px-2 text-center">{{$publisher->books->count()}}</td>
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
                                Nenhuma editora cadastrada até o momento
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </section>
  
@endsection