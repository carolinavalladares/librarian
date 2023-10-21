@extends('dashboard-layout')

@push('student_page')
  @vite('resources/js/students/students_page.js')
@endpush

@push('search_bar')
  @vite('resources/js/components/searchBar.js')
@endpush

@section('content')

    <section>
        <h1 class="text-lg font-semibold ">Estudantes cadastrados</h1>

        {{-- validation messages --}}
    <div>
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

        <div class="flex flex-col items-end justify-end gap-2">
            <div class="w-full"> 
                {{-- filtrar --}}
                <p class="text-xs font-medium mb-1">Filtrar:</p>
                <div class="text-sm font-medium flex flex-col w-full items-center justify-center bg-white shadow-sm p-1 rounded-sm gap-2 mb-2 sm:flex-row">
                    <a name='all' class="filter_link px-2 w-full text-center h-7 flex items-center justify-center sm:h-auto" href="{{route('students')}}">Todos</a>
                    <a name='approved' class="filter_link px-2 w-full text-center h-7 flex items-center justify-center sm:h-auto" href="{{route('students', ['filter'=>'approved'])}}">Autorizados</a>
                    <a name='denied' class="filter_link px-2 w-full text-center h-7 flex items-center justify-center sm:h-auto" href="{{route('students', ['filter'=>'denied'])}}">Negados</a>
                    <a name='null'class="filter_link px-2 w-full text-center h-7 flex items-center justify-center sm:h-auto" href="{{route('students', ['filter'=>'null'])}}">Pendentes</a>
                </div>
                {{-- buscar --}}
                <x-search-bar  :placeholder="'Buscar estudante'" />
                
            </div>
            


            <div>
                <p>
                   
                <span class="text-xs font-medium text-gray-600 mr-1">
                    {{$students->total()}} 
                    @if ($students->total() > 1 || $students->total() == 0)
                     estudantes
                    @else
                     estudante
                    @endif
                </span>
            
                </p>
            </div>
        </div>

        <div >
            
            @if($students->total() > 0)
                <div>
                    @foreach ( $students as $student )
                        <x-student-item :student="$student" />
                    @endforeach

                      {{-- Pagination --}}
                    <div>
                        {{$students->links()}}
                    </div>
                </div>
      
                 @else
                    @if(request()->query(('search')))
                        <div class="w-full bg-white h-20 flex items-center justify-center text-gray-500">
                            Nunhum resultado encontrado
                        </div>
                    @else
                        <div class="w-full bg-white h-20 flex items-center justify-center text-gray-500">
                            Nenhuma estudante cadastrado até o momento
                        </div>
                    @endif

            @endif

        </div>
       
  
    </section>
        
@endsection