@extends('dashboard-layout')

@section('content')
   <section >
    <h1 class="text-lg font-semibold ">Configurações da conta</h1>

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

    {{-- Account settings --}}
    <div class="bg-white shadow-md p-4 mt-2">
        <form action="{{route('change_password',['user'=>$user])}}" method="POST" >
            @csrf
            @method('post')
            <h2 class="font-semibold">Alterar senha</h2>

            <div class="flex flex-col mb-1">
                <label class="text-xs font-medium " for="current_password">Senha atual:</label>
                <input placeholder="Digite sua senha atual..." class="border h-9 text-sm px-4" name="current_password" id="current_password" type="password" >
            </div>
            <div class=" flex flex-col mb-1">
                <label class="text-xs font-medium" for="password">Senha nova:</label>
                <input placeholder="Digite a nova senha..." class="border h-9 text-sm px-4" name="password" id="password" type="password" >
            </div>
            <div class=" flex flex-col mb-1">
                <label class="text-xs font-medium" for="password_confirmation">Confirmar senha atual:</label>
                <input placeholder="Digite a nova senha novamente..." class="border h-9 text-sm px-4" name="password_confirmation" id="password_confirmation" type="password" >
            </div>
             {{-- submit btn --}}
             <input title="Mudar" class="text-sm h-9 flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto mt-2"  type="submit" value="Mudar">
        </form>
    </div>
   </section>
@endsection