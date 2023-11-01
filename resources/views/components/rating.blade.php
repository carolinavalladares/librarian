@props(['rating'=>$rating])

{{-- This is the rating component that is being used in the book details page, this component's javascript code is in /resources/js/books/book_rating.js --}}

<div name="{{$rating}}" class="star_container flex items-center justify-center w-fit">   
    <div class="star_empty relative bg-gray-200 w-5 h-5 ">
        <div style="width: 100%;max-width:0px" class="star bg-amber-400 h-full transition-all duration-300"></div>
    </div>
    <div class="star_empty relative bg-gray-200 w-5 h-5 ">
        <div style="width: 100%;max-width:0px" class="star bg-amber-400 h-full transition-all duration-300"></div>
    </div>
    <div class="star_empty relative bg-gray-200 w-5 h-5 ">
        <div style="width: 100%;max-width:0px" class="star bg-amber-400  h-full transition-all duration-300"></div>
    </div>
    <div class="star_empty relative bg-gray-200 w-5 h-5 ">
        <div style="width: 100%;max-width:0px" class="star bg-amber-400  h-full transition-all duration-300"></div>
    </div>
    <div class="star_empty relative bg-gray-200 w-5 h-5 ">
        <div style="width: 100%;max-width:0px" class="star bg-amber-400  h-full transition-all duration-300"></div>
    </div>
</div>