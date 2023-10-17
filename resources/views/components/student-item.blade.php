@props(['student'=>$student])

{{-- TODO: add possibility to edit user status and other info --}}

<div class="shadow-md bg-white p-4 mb-2 flex flex-col sm:flex-row-reverse sm:justify-between sm:items-start">
    {{-- approved status flag --}}
   <div class="text-xs font-medium flex items-center justify-end gap-1">   
    @if ($student->approved)
    <span class="text-emerald-600">Autorizado</span>
    <span class="block rounded-full h-3 w-3 bg-emerald-600"></span>
    @elseif (is_null($student->approved) )
    <div class="">
        <div class="flex gap-1 items-center justify-end mb-1">
            <span class="text-amber-500">Pendente</span>
            <span class="block rounded-full h-3 w-3 bg-amber-500"></span>
        </div>        
        <div class="flex items-center justify-end gap-2">
            <a title="aprovar estudante" class="rounded-sm inline-block px-1 leading-snug text-white font-medium bg-emerald-600" href="{{route('approve_student',['student'=>$student->id])}}">Autorizar</a>
            <a title="negar estudante" class="rounded-sm inline-block px-1 leading-snug text-white font-medium bg-rose-500" href="{{route('deny_student',['student'=>$student->id])}}">Negar</a>
        </div>
    </div>
   
    @else
    <span class="text-rose-500">Não Autorizado</span>
    <span class="block rounded-full h-3 w-3 bg-rose-500"></span>
    @endif
   
   </div>

    {{-- <th class="border">Matrícula</th>
    <th class="border">Nome</th>
    <th class="border">E-mail</th>
    <th class="border">Livros Emprestados</th>
    <th class="border">Status</th> --}}

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
    </div>  
   
</div>