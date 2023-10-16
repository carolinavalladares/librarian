@extends('dashboard-layout')

@push('search_bar')
  @vite('resources/js/components/searchBar.js')
@endpush
@push('checkout_page')
  @vite('resources/js/checkout/checkout_page.js')
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
      

       @foreach ($books as $book)
            <p>{{$book->name}}</p>
            <p>{{$book->available}}</p>
       @endforeach
       
       
       <div class="bg-white shadow-md  p-4">
        <h2 class="font-semibold mb-2">Nova Retirada</h2>
            
         <div class="flex items-center justify-center mb-2 gap-2 ">
                <x-search-bar :placeholder="'Buscar livro...'" />
            </div>
      

      

        {{-- This form is being submitted through Javascript (/resources/js/checkout/checkout_form.js) --}}
        <form class="checkout_form" action="{{route('handle_checkout')}}" method="POST">
            @csrf
            @method('post')
            <div class="flex flex-col flex-1 mb-2">
                {{-- books --}}
                 <fieldset>
                   
                   <div class="ml-2">
                    @if($books->total()> 0)
                        <div class="flex items-center justify-between border-b my-2">
                            <legend class="text-sm font-medium">Livros:</legend>

                            {{-- Books pagination --}}
                            {{$books->links('pagination::simple-default')}}
                        </div>
                        @foreach ($books as $book)
                            @if($book->quantity - $book->students->count() > 0)
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
                            @endif
                        @endforeach
                       
                    @endif
                   </div>
                 </fieldset>
             </div>

            <div class="flex flex-col flex-1 mb-2">
                {{-- student select --}}
                <label class="text-sm font-medium" for="student_id">Estudante:</label>
                <select class="student_select cursor-pointer border h-9 px-2" name="student_id" id="student_id" title="Escolher estudante">
                    <option class="opacity-30" disabled selected value={{null}}>Escolher estudante</option>
                    @foreach ($students as $student )
                        <option value={{$student->id}}>{{$student->name}}</option>
                    @endforeach
                </select>
            </div>
           

            {{-- submit btn --}}
            <input title="concluir" class="h-9 text-sm flex items-center justify-center px-2 bg-orange-500 text-white font-medium cursor-pointer mr-0 ml-auto" type="submit" value="Concluir">
        </form>
    </div>
    </section>
@endsection