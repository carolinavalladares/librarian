{{-- Hamburger icon --}}
<style>
  .first,
  .second,
  .third{
    height:2px;
    transition: all 0.3s ease-in-out;
  }


.first{
  width: 66.666667%;
}
.second{
  width: 100%;
  margin: 4px 0;
}
.third{
  width: 75%;
}

/* open state */

.hamburger-container.open .first{
  width:100%;
  transform-origin: left;
  transform: rotate(35deg);
}
.hamburger-container.open .second{
  width: 0;
}
.hamburger-container.open .third{

  width: 100%;
  transform-origin: left;
  transform: rotate(-35deg);
}
</style>

<div class="w-[21px] hamburger-container">
  <div class="rounded-sm bg-black first  "></div>
  <div class="rounded-sm bg-black second  "></div>
  <div class="rounded-sm bg-black third "></div>
</div>