@extends('dashboard-layout')

@push('student_page')
  @vite('resources/js/students/students_page.js')
@endpush

@section('content')

    <section>
        <h1 class="text-lg font-semibold ">Estudantes cadastrados</h1>
        <div class="flex items-end justify-between gap-2 mb-3">
            <div> 
                {{-- filtrar --}}
                <p class="text-xs font-medium mb-1">Filtrar:</p>
                <div class="text-sm flex items-center justify-center bg-white shadow-md p-1 rounded-sm gap-2">
                    <a name='all' class="filter_link px-2" href="{{route('students')}}">Todos</a>
                    <a name='approved' class="filter_link px-2" href="{{route('students', ['filter'=>'approved'])}}">Aprovados</a>
                    <a name='denied' class="filter_link px-2" href="{{route('students', ['filter'=>'denied'])}}">Negados</a>
                    <a name='null' class="filter_link px-2" href="{{route('students', ['filter'=>'null'])}}">Pendentes</a>
                </div>
                {{-- buscar --}}
                <div class="mt-1">
                    <form class="search_student_form bg-white shadow-md px-1 h-7 flex items-center justify-center rounded-sm text-sm min-w-[200px]" >
                        <input  class="search_input flex-1 outline-none px-1" type="text" placeholder="Buscar estudante">
                        <button title="buscar" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </button>
                    </form>
                </div>
            </div>
            


            <div>
                <p>
                    @if ($students->count()>0)
                <span class="text-sm text-gray-600 mr-1">
                    {{$students->count()}} 
                    @if ($students->count() > 1)
                     estudantes
                    @else
                     estudante
                    @endif
                </span>
            @endif
                </p>
            </div>
        </div>

        <div class="bg-white shadow-md p-4">
            @if($students->count() > 0)
            <table class="border text-sm w-full">
                <thead>
                    <th class="border">Matrícula</th>
                    <th class="border">Nome</th>
                    <th class="border">E-mail</th>
                    <th class="border">Livros Emprestados</th>
                    <th class="border">Status</th>
                </thead>
                
                <tbody class="[&>*:nth-child(even)]:bg-gray-100">
                @foreach ($students as $student)
                    <tr>
                        <td class="border text-center px-1">{{$student->registration}}</td>
                        <td class="border px-1">{{$student->name}}</td>
                        <td class="border text-center px-1">{{$student->email}}</td>
                        <td class="border text-center px-1">{{$student->borrowed_books->count()}}</td>

                        @if ($student->approved == true)
                        <td class="border px-1 text-emerald-600 text-center">Aprovado</td>
                        @elseif (is_null($student->approved))
                        <td class="px-1 flex items-center justify-center gap-2">
                            <a href="{{route('approve_student',['student'=>$student])}}" title="aprovar" class="flex items-center justify-center text-emerald-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><polyline points="20 6 9 17 4 12"/></svg>
                               <span>Aprovar</span>
                            </a>
                            <a href="{{ route('deny_student', ['student'=>$student]) }}" title="negar" class="flex items-center justify-center text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                <span>Negar</span>
                            </a>
                        </td>
                        @else
                        <td class="border px-1 text-red-500 text-center">Negado</td>
                        @endif
                        
                    </tr>
                @endforeach
                </tbody>
           </table>
                 @else
                    @if(request()->query(('search')))
                        <div class="w-full h-20 flex items-center justify-center text-gray-500">
                            Nunhum resultado encontrado
                        </div>
                    @else
                        <div class="w-full h-20 flex items-center justify-center text-gray-500">
                            Nenhuma estudante cadastrado até o momento
                        </div>
                    @endif
                @endif
        </div>
       
  
    </section>
        
@endsection