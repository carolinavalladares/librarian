@props(['iconSrc'=>$iconSrc,'label'=>$label,'route'=>$route, 'amount'=>$amount])

{{-- This is the cards that appear in dashboard index page --}}
<a title="{{$label}}" class="w-full block" href="{{route($route)}}">
    <div class="p-4 bg-white shadow-md rounded-sm">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 flex items-center justify-center rounded-full bg-orange-200">
                <img class="block w-5" src="{{url($iconSrc)}}" alt="card_icon">
            </div>
            <p class=" font-medium">{{$label}}</p>
        </div>
        <p class="text-xl text-center font-semibold ml-2 mt-2">{{$amount}}</p>
    </div>
</a>