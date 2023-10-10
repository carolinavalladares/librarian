<nav class="bg-white py-5 shadow-md min-h-[400px] min-w-[200px]">
    <div class="flex flex-col">
        <a title="Librarian" href="/">
            <x-logo/>
        </a>

    
        <ul class="mt-2 flex-1 flex justify-center flex-col min-h-[200px]">
             <li >
                 <a name="dashboard" title="início" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('dashboard')}}">Início</a>
             </li>
             <li >
                 <a name="authors" title="autores" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('authors')}}">Autores</a>
             </li>
             <li >
                 <a name="publishers" title="editoras" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('publishers')}}">Editoras</a>
             </li>
             <li >
                 <a name="genres" title="categorias" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('genres')}}">Categorias</a>
             </li>
             <li >
                 <a name="books" title="livros" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('books')}}">Livros</a>
             </li>
             <li >
                 <a name="students" title="estudantes" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('students')}}">Estudantes</a>
             </li>
             {{-- logout btn --}}
             <li >
                 <a title="Sair" class="w-full h-7 flex items-center px-4 font-medium text-rose-500" href="{{route('logout')}}">Sair</a>
             </li>
             
        </ul>
    </div>
</nav>