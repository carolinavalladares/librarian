@props(['student'=>$student])

<div class="text-sm font-medium my-2">
    <span class="block text-sm font-medium">Mudar status:</span>

    <div>
        @if($student->approved)
            <a title="Autorizar" class="text-white bg-emerald-500 px-1 rounded-sm" href="{{route('approve_student',['student'=>$student])}}">Autorizar</a>
            <a title="Não autorizar" class="text-rose-500  px-1 rounded-sm" href="{{route('deny_student',['student'=>$student])}}">Negar</a>
        @elseif(is_null($student->approved))
            <a title="Autorizar" class="text-emerald-500  px-1 rounded-sm" href="{{route('approve_student',['student'=>$student])}}">Autorizar</a>
            <a title="Não autorizar" class="text-rose-500  px-1 rounded-sm" href="{{route('deny_student',['student'=>$student])}}">Negar</a>
        @else
            <a title="Autorizar" class="text-emerald-500 px-1 rounded-sm" href="{{route('approve_student',['student'=>$student])}}">Autorizar</a>
            <a title="Não autorizar" class="text-white bg-rose-500  px-1 rounded-sm" href="{{route('deny_student',['student'=>$student])}}">Negar</a>
        @endif
    </div>
    

</div>