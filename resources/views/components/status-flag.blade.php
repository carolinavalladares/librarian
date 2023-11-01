@props(['student'=>$student, 'show-options'=> $showOptions])

{{-- This component is the status flag component that is rendered in the student cards in the students page, according to the student status it will decide what color it should have and depending on the showOptions prop it will decide if it should or shouldn't show the approve/deny options  --}}

<div>
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
            @if ($showOptions)
                <div class="flex items-center justify-end gap-2">
                    <a title="aprovar estudante" class="rounded-sm inline-block px-1 leading-snug text-white font-medium bg-emerald-600" href="{{route('approve_student',['student'=>$student->id])}}">Autorizar</a>
                    <a title="negar estudante" class="rounded-sm inline-block px-1 leading-snug text-white font-medium bg-rose-500" href="{{route('deny_student',['student'=>$student->id])}}">Negar</a>
                </div>
            @endif            
        </div>
       
        @else
            <span class="text-rose-500">Não Autorizado</span>
            <span class="block rounded-full h-3 w-3 bg-rose-500"></span>
        @endif
       
       </div>
</div>