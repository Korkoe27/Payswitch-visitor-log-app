@props(['active' => false])

<a  class="{{ $active  ?  'hover:bg-[#003C90] bg-[#003C90] text-[#C8DFFF] font-bold' : 'text-[#C8DFFF] font-normal lg:text-base hover:bg-[#003C90] md:text-sm'  }} lg:px-5 flex items-center rounded-md w-full lg:py-4 gap-2" {{$attributes}}    aria-current="{{  $active ?  'page' : 'false'}}" >
      {{$slot}}              
 </a>