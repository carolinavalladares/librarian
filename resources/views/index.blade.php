
 @extends('layout')


@section('content')
    <section>

        <div class="mb-10">
            <h1 class="text-2xl font-semibold text-center">Bem-vindo ao Librarian</h1>

            <p class="text-center">Sistema de gerenciamento de biblioteca</p>
        </div>
        


        <div class="flex flex-col items-center justify-center gap-5 max-w-lg m-auto w-full">
            <a title="login como bibliotecário(a)" class="h-11 w-full text-base font-medium flex items-center justify-center bg-orange-500 text-white " href="/login">
                Fazer login como bibliotecário(a)
            </a>

            <a title="novo registro de estudante" class="h-11 w-full text-base font-medium flex items-center justify-center bg-black text-white  " href="/">
                Novo registro de estudante
            </a>
        </div>
    </section>
@endsection