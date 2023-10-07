<nav class="bg-white shadow-md p-4 min-h-[400px] min-w-[200px]">
    <div class="">
        <a title="Librarian" href="/">
            <x-logo/>
        </a>

        <ul class="mt-2">
             <li >
                 <a title="início" class="w-full h-7 flex items-center justify-center font-medium" href="{{route('dashboard')}}">Início</a>
             </li>
             <li >
                 <a title="autores" class="w-full h-7 flex items-center justify-center font-medium" href="{{route('authors')}}">Autores</a>
             </li>
             {{-- logout btn --}}
             <li >
                 <a title="Sair" class="w-full h-7 flex items-center justify-center font-medium text-rose-500" href="{{route('logout')}}">Sair</a>
             </li>
             
        </ul>
    </div>
</nav>