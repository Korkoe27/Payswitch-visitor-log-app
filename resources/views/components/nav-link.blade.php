@props(['active' => false])

<a  class="{{ $active  ?  ' bg-[#003C90] text-[#C8DFFF] font-bold' : 'text-[#C8DFFF] hover:text-blue-300 font-normal lg:text-base hover:bg-[#5995ea] md:text-sm'  }} lg:px-5 flex items-center rounded-md w-full lg:py-4 gap-2" {{$attributes}}    aria-current="{{  $active ?  'page' : 'false'}}" >
      {{$slot}}              
 </a>
 