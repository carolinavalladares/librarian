@props(['id'=>$id,'coverImage'=>$coverImage,'title'=>$title,'author'=>$author, 'available'=>$available,'borrowed'=>$borrowed ])

<div class="flex item-start justify-start gap-2 mb-3 shadow-md bg-white p-1">
    <div class="relative overflow-hidden min-w-[80px] w-20 flex items-center justify-center">
        <img class="w-full block" src="{{asset('/assets/images/books/' . $coverImage)}}" alt="capa do livro {{$title}}">
    </div>
  
    <div class="pt-1">
        <div class="mb-1">
            <p class="text-xs sm:text-sm leading-none">Title</p>
            <p class="font-medium text-xs sm:text-sm">{{$title}}</p>
        </div>
       
        <div>
            <p class="text-xs sm:text-sm leading-none">Autor</p>
            <p class="font-medium text-xs sm:text-sm">{{$author}}</p>
        </div>

        {{-- availability info --}}
        <div class="flex flex-col items-start justify-start text-xs sm:text-sm sm:gap-2 sm:flex-row">
            <div class="flex items-center gap-1 ">
                <p class="">Disponíveis:</p>
                <p class="font-medium">{{$available}}</p>
            </div>
            <div class="flex items-center gap-1 ">
                <p class="">Emprestados:</p>
                <p class="font-medium">{{$borrowed}}</p>
            </div>
        </div>
    </div>
    
</div>