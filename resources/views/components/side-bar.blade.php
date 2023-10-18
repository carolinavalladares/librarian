<nav class="bg-white pt-5 shadow-md w-full md:w-fit md:min-h-[400px] md:min-w-[200px] md:py-5 ">
    <div class="flex flex-col ">
        <div class="flex items-center justify-between px-4 ">
            <a  title="Librarian" href="{{route('dashboard')}}">
                <x-logo/>
            </a>
            <button title="menu de navegação" class="hamburger md:hidden">
                <x-hamburger/>
            </button>
        </div>
       

    
        <ul class="nav-list px-4 flex justify-center flex-col max-h-0 mb-5 overflow-hidden transition-all duration-500 text-sm   md:mb-0 md:mt-2 md:flex-1 md:px-0 md:max-h-max">
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
             <li >
                 <a name="librarians" title="bibliotecários" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('librarians')}}">Bibliotecários</a>
             </li>
             <li >
                 <a name="checkout" title="retirada" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('checkout')}}">Retirada</a>
             </li>
             <li >
                 <a name="return" title="devolução" class="nav_link w-full h-10 flex items-center px-4 font-medium border-b" href="{{route('return')}}">Devolução</a>
             </li>
             {{-- logout btn --}}
             <li >
                 <a title="Sair" class="w-full h-7 flex items-center px-4 font-medium text-rose-500" href="{{route('logout')}}">Sair</a>
             </li>
             
        </ul>
    </div>
</nav>