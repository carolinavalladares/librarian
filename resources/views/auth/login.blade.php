@extends('layout')

@section('content')

    <section>
        <h1 class="text-xl font-semibold text-center mb-7">Login Bibliotecário(a)</h1>

        {{-- validation messages --}}
        <div class="max-w-xl m-auto w-full ">
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

        <form class="bg-white max-w-xl m-auto w-full p-4 shadow-md" action="{{route('handle_login')}}" method="POST">
            @csrf
            @method('post')
    
    
            <div class="flex flex-col mb-4">
                <label class="mb-1 text-sm" for="email">Email:</label>
                <input placeholder="Digite seu e-mail..." class="h-10 px-2 border text-sm" type="text" name="email" id="email">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-1 text-sm" for="password">Senha:</label>
                <input placeholder="Digite sua senha..." class="h-10 px-2 border text-sm" type="password" name="password" id="password">
            </div>
    
            <input title="Entrar" class="px-4 h-9 text-sm font-semibold text-white bg-orange-500 flex items-center justify-center cursor-pointer mr-0 ml-auto mt-4" type="submit" value="Entrar">
    
        </form>
    </section>
    
@endsection