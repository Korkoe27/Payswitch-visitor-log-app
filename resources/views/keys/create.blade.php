<x-layout>

    <x-slot:heading>
        Pick your Office Key
    </x-slot:heading>


    <aside class="">
        <form action="{{url('log-key')}}" class="">
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="mb-12">
                   <label for="" class="mb-[10px] block text-base font-medium text-dark dark:text-white">
                   Who are you?
                   </label>
                   <div class="relative z-20">
                      <select class="relative z-20 w-full appearance-none rounded-lg border border-stroke dark:border-dark-3 bg-transparent py-[10px] px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2" >
                         <option value="" class="dark:bg-dark-2">Option</option>
                         <option value="" class="dark:bg-dark-2">Option</option>
                         <option value="" class="dark:bg-dark-2">Option</option>
                      </select>
                      <span class="absolute right-4 top-1/2 z-10 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                      </span>
                   </div>
                </div>
             </div>
        </form>
    </aside>


</x-layout>