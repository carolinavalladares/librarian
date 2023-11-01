@props(['message'=>$message, 'type'=> $type])

{{-- This is the validation message component, depending on the type passed in through props it will decide which color it should have --}}

<div>
    @if ($type=="error")
        <p class="text-rose-600 rounded-sm bg-rose-200 py-1 px-2 flex items-center font-medium text-sm">{{$message}}</p>
    @elseif ($type=="success")
        <p class="text-emerald-600 rounded-sm bg-emerald-200 py-1  px-2 flex items-center font-medium text-sm mb-2">{{$message}}</p>
    @endif
</div>