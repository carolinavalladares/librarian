@extends('layout')

@section('content')
    <section>
        <h1 class="text-center text-xl font-semibold mb-4">Registro de Estudante</h1>


        {{-- validation messages --}}
        <div class="max-w-lg m-auto">
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

        {{-- Student registration form --}}
        <form action="{{ route('handle_student_register') }}" method="POST" class="max-w-lg m-auto bg-white shadow-md p-4 text-sm" >
            @csrf
            @method('post')
            <div class="flex flex-col mb-4">
                <label class="mb-1" for="name">Nome:</label>
                <input class="border h-9 px-4" type="text" name="name" id="name" placeholder="Digite seu nome...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-1" for="email">E-mail:</label>
                <input class="border h-9 px-4" type="email" name="email" id="email" placeholder="Digite seu e-mail...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-1" for="registration">Matrícula:</label>
                <input class="border h-9 px-4" type="number" name="registration" id="registration" placeholder="Digite sua matrícula...">
            </div>
        
            <input title="Registrar" class="h-9 text-white flex items-center justify-center bg-orange-500 w-full cursor-pointer font-semibold" type="submit" value="Registrar">
        </form>
    </section>
@endsection