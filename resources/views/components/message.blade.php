@props(['message'=>$message, 'type'=> $type])

<div>
    @if ($type=="error")
        <p class="text-rose-600 bg-rose-200 h-9 px-2 flex items-center font-medium text-sm">{{$message}}</p>
    @elseif ($type=="success")
        <p class="text-emerald-600 bg-emerald-200 h-9 px-2 flex items-center font-medium text-sm mb-2">{{$message}}</p>
    @endif
</div>