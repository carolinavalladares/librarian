@extends('dashboard-layout')


@push('return_page')
  @vite('resources/js/checkout/return_page.js')
@endpush

@section('content')
    <section>
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
      
        @isset($books)
            @foreach ($books as $book)
                <p>{{$book->name}}</p>
                <p>{{$book->available}}</p>
            @endforeach
        @endisset
     
       
       
       <div class="bg-white shadow-md  p-4">
        <h2 class="font-semibold mb-2">Devolução</h2>

            {{-- Student select --}}
            <form class="select_student_form" method="GET" action="{{route('return')}}">
                <div class="ml-2 flex flex-col flex-1 mb-2">             
                    <label class="text-sm font-medium" for="student_id">Estudante:</label>
                    <select class="student_select_return_page cursor-pointer border h-9 px-2" name="student" id="student_id" title="Escolher estudante">
                        {{-- if a student is selected --}}
                        @isset($selectedStudent)
                            <option class="opacity-30" disabled  value={{null}}>Escolher estudante</option>
                            @foreach ($students as $student )
                                @if ($selectedStudent->id == $student->id)
                                    
                                    <option selected value={{$student->id}}>{{$student->name}}</option>
                                @else
                                    <option value={{$student->id}}>{{$student->name}}</option>
                                @endif
                            @endforeach
                        @else
                        {{-- else if no student is selected --}}
                            <option selected class="opacity-30" disabled  value={{null}}>Escolher estudante</option>
                            @foreach ($students as $student )
                                <option value={{$student->id}}>{{$student->name}}</option>
                            @endforeach
                        @endisset
                       
                    </select>
                </div>
            </form>

            {{-- selected books student is returning --}}
            <div>
                @isset($selectedStudent)
                <form action="{{ route('handle_return', $selectedStudent->id) }}" method="POST">
                    @csrf
                    @method('post')
                  {{-- books --}}
                 <fieldset>

                 
                    <div class="ml-2">
                     @if($books->count() > 0)
                         <div class="flex items-center justify-between border-b my-2">
                             <legend class="text-sm font-medium">Livros emprestados:</legend>
                         </div>
                         @foreach ($books as $book)
                             
                             <div class="input_container flex items-center justify-start gap-1 mb-1">
                                 
                                 <label class="checkbox-label text-xs  font-medium flex gap-2 items-center border px-2 cursor-pointer h-9 w-full rounded-sm" for="{{$book->id}}">
                                     {{-- hidden checkbox --}}
                                     <input class="hidden  book_checkbox" type="checkbox" value="{{$book->id}}" name="books[]" id="{{$book->id}}">
 
                                     {{-- fake checkbox --}}
                                  <div class="fake-checkbox h-4 w-4 flex items-center justify-center text-white border rounded-sm">
                                     <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check"><polyline points="20 6 9 17 4 12"/></svg>
                                  </div>
 
                                  {{-- book title --}}
                                 {{$book->title}}                            
                             </label>
                             </div>                                    
                        
                         @endforeach
                        
                     @endif
                    </div>
                  </fieldset>

                  <input title="concluir" class="h-9 text-sm flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mt-2 mr-0 ml-auto" type="submit" value="Concluir">
                </form>
                @endisset
            </div>
    </div>
    </section>
@endsection