@props(['active' => false])

<a  class="{{ $active  ?  'md:bg-[#e3effc] text-blue-900 font-bold' : 'text-black font-normal lg:text-base hover:bg-[#e3effc] md:text-sm'  }} flex items-center w-full  md:py-4 md:px-10  gap-2" {{$attributes}}    aria-current="{{  $active ?  'page' : 'false'}}" >
      {{$slot}}              
 </a>