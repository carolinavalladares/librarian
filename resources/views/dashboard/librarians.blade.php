@extends('dashboard-layout')

@push('librarian_page')
    @vite('/resources/js/librarians/librarian_page.js')
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

    {{-- create librarian form --}}
    <form class="librarian_form px-4 py-3  bg-white shadow-md w-full " action="{{ route('handle_librarian_register') }}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <h2 title="cadastrar novo bibiotecário" class="add_new_librarian flex items-center justify-between cursor-pointer">
           <span class="font-semibold">Cadastrar novo bibiotecário</span>

           <button type="button" class="btn_arrow transition-all duration-500 text-gray-400 w-fit max-w-fit origin-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down"><path d="m6 9 6 6 6-6"/></svg>
           </button>
        </h2>

     {{-- fields container --}}
       <div class="max-h-0 overflow-hidden transition-all duration-500 form_container text-sm">
        <div class="pt-2 flex flex-col mb-2">
            <label class=" mb-1" for="name">Nome:</label>
            <input placeholder="Digite o nome..."  class="border px-4 h-9"  type="text" name="name">
        </div>
        <div class="flex flex-col mb-2">
            <label class=" mb-1" for="email">E-mail:</label>
            <input placeholder="Digite o e-mail..." class="border px-4 h-9"  type="email" name="email">
        </div>
        <div class="flex flex-col mb-2">
            <label class=" mb-1" for="password">Senha:</label>
            <input placeholder="Digite a senha..." class="border px-4 h-9" type="password" name="password">
        </div>
        <div class="flex flex-col mb-2">
            <label class=" mb-1" for="password_confirmation">Confirmar senha:</label>
            <input  placeholder="Digite a senha novamente..." class="border px-4 h-9" type="password" name="password_confirmation">
        </div>

       {{-- submit btn --}}
       <input title="cadastrar" class="h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto"  type="submit" value="Cadastrar">
       </div>
    
    </form>
    
    {{-- librarians  list --}}
    <div class="mt-2">
        <div class="flex items-center justify-between gap-2">
            <h2 class="font-semibold">Bibiotecários</h2>


            {{-- search --}}
            <x-search-bar :placeholder="'Buscar bibliotecário'" />
           
            <span class="text-sm text-gray-600 mr-1">
                  {{$librarians->count()}} 
                  @if ($librarians->count() > 1 || $librarians->count() == 0)
                  bibiotecários
                  @else
                  bibiotecário
                  @endif
            </span>
        </div>

        <div class="mt-2 p-4 bg-white shadow-md">
            @if($librarians->count() > 0)
                <table class="border w-full text-sm">
                    <thead>
                        <th class="border ">ID</th>
                        <th class="border ">Nome</th>
                        <th class="border ">E-mail</th>
                       
                    </thead>
                    <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                        @foreach ($librarians as $librarian)
                            <tr >
                                <td class="border px-2 text-center">{{$librarian->id}}</td>
                                <td class="border  px-2">{{$librarian->name}}@if($librarian->id == $user->id) <span class="text-xs text-gray-500">(você)</span> @endif</td>                               
                                <td class="border  px-2 text-center">{{$librarian->email}}</td>
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
                        Nunhum bibliotecário cadastrado até o momento
                    </div>
                @endif
            @endif
        </div>
    </div>
</section>
    
@endsection