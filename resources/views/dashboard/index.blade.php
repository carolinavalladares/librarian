@extends('dashboard-layout')

@section('content')
    <section>
      <div class="grid grid-cols-1 sm:grid-cols-6 gap-2 items-center sm:flex-row">
        <div class=" col-span-2 w-full">
            <x-dashboard-card :iconSrc="'/assets/icons/librarians.svg'" :label="'Bibliotecários'" :route="'librarians'" :amount="$librarians" />
        </div>
        <div class="  col-span-2 w-full">
            <x-dashboard-card :iconSrc="'/assets/icons/books.svg'" :label="'Livros'" :route="'books'" :amount="$books" />
        </div>
        <div class="  col-span-2 w-full">
            <x-dashboard-card :iconSrc="'/assets/icons/authors.svg'" :label="'Autores'" :route="'authors'" :amount="$authors" />
        </div>
        <div class=" col-span-3 w-full">
            <x-dashboard-card :iconSrc="'/assets/icons/genres.svg'" :label="'Categorias'" :route="'genres'" :amount="$genres" />
        </div>
        <div class="  col-span-3 w-full">
            <x-dashboard-card :iconSrc="'/assets/icons/publishers.svg'" :label="'Editoras'" :route="'publishers'" :amount="$publishers" />
        </div>
      </div>
     
    </section>
    
@endsection