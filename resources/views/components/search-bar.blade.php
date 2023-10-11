@props(['placeholder'=>$placeholder])

<div>
    <form class="search_form  bg-white shadow-md px-1 h-7 flex items-center justify-center rounded-sm text-sm min-w-[200px]" >
        <input  class="search_input flex-1 outline-none px-1" type="text" placeholder="{{$placeholder}}">
        <button title="buscar" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
        </button>
    </form>
</div>