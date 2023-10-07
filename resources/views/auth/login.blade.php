@extends('layout')

@section('content')

    <section>
        <h1 class="text-xl font-semibold text-center mb-7">Login Bibliotecário(a)</h1>

        <div>
            @if ($errors->any())
            <ul class="max-w-xl m-auto flex flex-col gap-2 mb-2 ">
                @foreach ($errors->all() as $error )
                        <li class="text-red-600 bg-red-200 h-9 flex items-center justify-center text-sm font-medium ">{{$error}}</li>
                @endforeach
            </ul>
                
            @endif
        </div>

        <form class="bg-white max-w-xl m-auto w-full p-4 shadow-md" action="{{route('handle_login')}}" method="POST">
            @csrf
            @method('post')
    
    
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-sm" for="email">Email:</label>
                <input placeholder="Digite seu e-mail..." class="h-10 px-2 border text-sm" type="text" name="email" id="email">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 text-sm" for="password">Senha:</label>
                <input placeholder="Digite sua senha..." class="h-10 px-2 border text-sm" type="password" name="password" id="password">
            </div>
    
            <input title="Entrar" class="px-4 h-9 text-sm font-semibold text-white bg-orange-500 flex items-center justify-center cursor-pointer mr-0 ml-auto mt-4" type="submit" value="Entrar">
    
        </form>
    </section>
    
@endsection