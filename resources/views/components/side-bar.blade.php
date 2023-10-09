<nav class="bg-white shadow-md p-4 min-h-[400px] min-w-[200px]">
    <div class="flex flex-col">
        <a title="Librarian" href="/">
            <x-logo/>
        </a>

        <ul class="mt-2 flex-1 flex justify-center flex-col min-h-[200px]">
             <li >
                 <a title="início" class="w-full h-7 flex items-center px-4 font-medium" href="{{route('dashboard')}}">Início</a>
             </li>
             <li >
                 <a title="autores" class="w-full h-7 flex items-center px-4 font-medium" href="{{route('authors')}}">Autores</a>
             </li>
             <li >
                 <a title="editoras" class="w-full h-7 flex items-center px-4 font-medium" href="{{route('publishers')}}">Editoras</a>
             </li>
             <li >
                 <a title="categorias" class="w-full h-7 flex items-center px-4 font-medium" href="{{route('genres')}}">Categorias</a>
             </li>
             <li >
                 <a title="livros" class="w-full h-7 flex items-center px-4 font-medium" href="{{route('books')}}">Livros</a>
             </li>
             {{-- logout btn --}}
             <li >
                 <a title="Sair" class="w-full h-7 flex items-center px-4 font-medium text-rose-500" href="{{route('logout')}}">Sair</a>
             </li>
             
        </ul>
    </div>
</nav>