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
                   <legend>Livros:</legend>
                   <div class="ml-2">
                    @foreach ($books as $book)
                        @if($book->quantity - $book->students->count() > 0)
                        <div class="flex items-center justify-start gap-1 mb-1">
                            <input class="book_checkbox accent-orange-500" type="checkbox" value="{{$book->id}}" name="books[]" id="{{$book->id}}">
                            <label class="text-xs font-medium" for="{{$book->id}}">{{$book->title}}</label>
                        </div>
                                
                        @endif
                    @endforeach
                   </div>
                 </fieldset>
             </div>

            <div class="flex flex-col flex-1 mb-2">
                {{-- student select --}}
                <label for="student_id">Estudante:</label>
                <select class="cursor-pointer border h-9 px-2" name="student_id" id="student_id" title="Escolher estudante">
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