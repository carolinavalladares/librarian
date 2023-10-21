@extends('dashboard-layout')

@push('charts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@vite('resources/js/components/chart.js')
@endpush

@section('content')
    <section>
      <div class="grid grid-cols-1 md:grid-cols-6 gap-2 items-center  mb-4">
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

      <div class="bg-white shadow-md p-4 ">
        <a title="estudantes" href="{{route('students')}}">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-9 h-9 flex items-center justify-center bg-orange-200 rounded-full">
                        <img class="w-6" src="{{url('/assets/icons/students.svg')}}" alt="">
                    </div>
                    <p class="font-medium">Estudantes</p>
                </div>
                <div class="text-xs font-medium text-gray-700 flex items-center justify-center gap-1">
                    <p>{{$students->count()}}</p>
                    @if ($students->count()>1)
                    <span>estudantes cadastrados</span>
                    @else
                    <span>estudante cadastrado</span>
                    @endif
                </div>
            </div>
        </a>
        
        <div name="{{$students}}" class="chart_container relative min-h-[auto] w-full">
            <canvas  class="max-w-[500px] lg:max-w-[700px] m-auto" id="studentChart" style="width:100%;"></canvas>
          </div>
      </div>
     
     
    </section>
    
@endsection