@props(['student'=>$student])


{{-- This is the student card component being rendered in the students page  --}}

<div class="shadow-md bg-white p-4 mb-2 flex flex-col sm:block sm:justify-between sm:items-start">

     {{-- approved status flag --}}
   <x-status-flag :student="$student" :show-options="true" />
    
   {{-- student information --}}
    <div>
        <p class="font-medium mb-1">{{$student->name}}</p>
        <div class="flex items-center justify-start gap-1 mb-1">
            <span class="text-xs font-medium leading-none">Matrícula:</span>
            <span class="text-sm leading-none">{{trim(chunk_split($student->registration,4," "))}}</span>                       
        </div>
        <div class="flex items-center justify-start gap-1 mb-1">
            <span class="text-xs font-medium leading-none">E-mail:</span>
            <span class="text-sm leading-none">{{$student->email}}</span>                       
        </div>
        <div class="flex items-start flex-col justify-start gap-1 mb-1">
            <span class="text-xs font-medium leading-none">Livros Emprestados:</span>
            <div class="flex flex-wrap gap-1">
                @if ($student->borrowed_books->count() > 0)
                    @foreach ($student->borrowed_books as $book )
                     <span class="text-xs px-1 bg-orange-200">{{$book->title}}</span>
                    @endforeach
                @else
                    <p class="text-xs text-gray-500">Nenhum livro emprestado no momento... </p>
                @endif                
            </div>                     
        </div>

        <div class="flex items-center justify-end mt-1">
            <a href="{{route('student_page', ['student'=>$student->id])}}" title="ver mais" class="text-xs  text-orange-500 font-medium flex items-center">
                Ver mais
                <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down -rotate-90"><path d="m6 9 6 6 6-6"/></svg>
                
            </a>
        </div>

    </div>  
   
</div>