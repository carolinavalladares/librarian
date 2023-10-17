@props(['book'=>$book ])

{{-- TODO: add book details page when user clicks on card, add possibilities to edit book --}}

<div class="flex flex-col item-start justify-start gap-2 mb-3 shadow-md bg-white ">
    <div class="relative  overflow-hidden min-w-[80px] w-full h-36 flex items-center justify-center">
        <img class="w-full block " src="{{asset('/assets/images/books/' . $book->image)}}" alt="capa do livro {{$book->title}}">
    </div>
  
    <div class="p-4">
        <div class="mb-1">
            <p class="text-xs  leading-none font-medium">Title</p>
            <p class="font-medium text-xs sm:text-sm">{{$book->title}}</p>
        </div>
       
        <div class="mb-1">
            <p class="text-xs leading-none font-medium">Autor</p>
            <p class="font-medium text-xs sm:text-sm">{{$book->author->name}}</p>
        </div>

         {{-- availability info --}}
         <div class="flex flex-col items-start justify-start">
            <div class="flex items-center justify-between gap-1 leading-none mb-1 border-b w-full">
                <p class="text-xs font-medium">Disponíveis:</p>
                <p class="font-medium">{{$book->quantity - $book->students->count()}}</p>
            </div>
            <div class="flex items-center justify-between gap-1 leading-none mb-1 border-b w-full">
                <p class="text-xs font-medium">Emprestados:</p>
                <p class="font-medium">{{$book->students->count()}}</p>
            </div>
        </div>

        <div>
            <p class="text-xs font-medium">Categorias:</p>
            <div class="flex flex-wrap gap-1 ">
                
                @foreach ($book->genres as $genre )
                    <span class="text-xs px-1 bg-orange-200">{{$genre->name}}</span>
                @endforeach
            </div>
        </div>

       
    </div>
    
</div>