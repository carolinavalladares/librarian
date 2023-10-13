@props(['placeholder'=>$placeholder])



<div class=" w-full max-w-full">
    <form class="search_form  bg-white shadow   px-2 h-7  flex items-center justify-center rounded-sm text-sm " method="GET">
       @csrf
        <input  class="search_input flex-1 outline-none px-1 placeholder:font-light" type="text" placeholder="{{$placeholder}}">
        <button title="buscar" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </button>
        <button title="ver todos" class="all-btn hidden ml-1 text-xs hover:underline text-orange-500" type="button">
            Ver todos
        </button>
    </form>
</div>