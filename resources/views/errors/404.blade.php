@extends('layout')

@section('content')
    <section>
       
        <div class="flex flex-col items-center justify-between md:flex-row h-full gap-4">
           
            <div class="flex flex-col items-center gap-4">
                <h1 class="font-semibold text-center mb-4 text-2xl leading-none">Opa... Parece que você está perdido</h1>
                <p class="text-center">A página que você está tentando acessar não existe...</p>
                <a href="/" title="voltar" class="bg-orange-500 text-white font-semibold text-lg px-4 py-2 rounded block">Voltar</a>
            </div>

            <img class="max-w-full" src="{{ url('/assets/images/404.gif') }}" alt="">
        </div>       
    </section>
@endsection