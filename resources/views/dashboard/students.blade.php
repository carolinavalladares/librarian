@extends('dashboard-layout')

@push('students_filter')
  @vite('resources/js/students_filter.js')
@endpush

@section('content')

    <section>
     
        <div class="flex items-end justify-between gap-2 mb-3">
            <h1 class="text-lg font-semibold ">Estudantes</h1>
           
            <div> 
                <p class="text-xs font-medium mb-1">Filtrar:</p>
                <div class="text-sm flex items-center justify-center bg-white shadow-md p-1 rounded-sm gap-2">
                    <a name='all' class="filter_link px-2" href="{{route('students')}}">Todos</a>
                    <a name='approved' class="filter_link px-2" href="{{route('students', ['filter'=>'approved'])}}">Aprovados</a>
                    <a name='denied' class="filter_link px-2" href="{{route('students', ['filter'=>'denied'])}}">Negados</a>
                    <a name='null' class="filter_link px-2" href="{{route('students', ['filter'=>'null'])}}">Pendentes</a>
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
        </div>
       
  
    </section>
        
@endsection