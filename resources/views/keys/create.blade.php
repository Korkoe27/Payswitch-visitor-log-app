<x-layout>

    <x-slot:heading>
        Pick your Office Key
    </x-slot:heading>


    <aside class="">
        <form action="{{url('log-key')}}" class="w-full" method="POST">

            @csrf
            <div class="w-full md:w-1/2 lg:w-1/3">



                <div class="mb-12 w-full relative">                
                    @if (session()->has('error'))
                    {{-- <p class="">{{ session()->get('error') }}</p> --}}


                    <div class="flex items-center absolute top-0 gap-4 justify-evenly h-fit  bottom-0 lg:left-[700px] w-fit left-1/2 lg:w-[25rem]  p-4 rounded-lg shadow-md ">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" class="bg-red-100 rounded-xl" height="40" viewBox="0 0 48 48">
                            <linearGradient id="hbE9Evnj3wAjjA2RX0We2a_OZuepOQd0omj_gr1" x1="7.534" x2="27.557" y1="7.534" y2="27.557" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f44f5a"></stop><stop offset=".443" stop-color="#ee3d4a"></stop><stop offset="1" stop-color="#e52030"></stop></linearGradient><path fill="url(#hbE9Evnj3wAjjA2RX0We2a_OZuepOQd0omj_gr1)" d="M42.42,12.401c0.774-0.774,0.774-2.028,0-2.802L38.401,5.58c-0.774-0.774-2.028-0.774-2.802,0	L24,17.179L12.401,5.58c-0.774-0.774-2.028-0.774-2.802,0L5.58,9.599c-0.774,0.774-0.774,2.028,0,2.802L17.179,24L5.58,35.599	c-0.774,0.774-0.774,2.028,0,2.802l4.019,4.019c0.774,0.774,2.028,0.774,2.802,0L42.42,12.401z"></path><linearGradient id="hbE9Evnj3wAjjA2RX0We2b_OZuepOQd0omj_gr2" x1="27.373" x2="40.507" y1="27.373" y2="40.507" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a8142e"></stop><stop offset=".179" stop-color="#ba1632"></stop><stop offset=".243" stop-color="#c21734"></stop></linearGradient><path fill="url(#hbE9Evnj3wAjjA2RX0We2b_OZuepOQd0omj_gr2)" d="M24,30.821L35.599,42.42c0.774,0.774,2.028,0.774,2.802,0l4.019-4.019	c0.774-0.774,0.774-2.028,0-2.802L30.821,24L24,30.821z"></path>
                            </svg>

                        <h3 class="">{{ session()->get('error') }}</h3>

                        <button type="button" onclick="this.parentElement.style.display='none'">
                            <img src="{{ asset('x.svg') }}" alt="" class="w-5 h-5">
                        </button>
                    </div>
                @endif
                   <label for="" class="mb-[10px] block text-base font-medium text-black">
                   Who are you?
                   </label>
                   <div class="">
                      <select class="p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-1/2" name="picked_by" required >
                            <option value="" selected disabled class="">Find your name.</option>
                        @foreach ($employees as $employee)
                         <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
                        @endforeach
                      </select>
                      <select class="p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-1/2" name="key_number" required >
                            <option value="" selected disabled class="">What Key are you picking?</option>
                        @foreach ($keys as $key)
                         <option value="{{$key->id}}" class="text-black">{{$key->key_name}}</option>
                        @endforeach
                      </select>

                   </div>
                </div>

                <div class="">
                    <button type="submit"
                        class="bg-blue-400 rounded-md inline-flex items-center justify-center py-3 px-7 text-center text-base font-medium text-white hover:bg-[#1B44C8] hover:border-[#1B44C8] disabled:bg-gray-3 disabled:border-gray-3 disabled:text-dark-5 active:bg-[#1B44C8] active:border-[#1B44C8]">
                        Pick Key
                        </button>
                </div>
             </div>
        </form>
    </aside>


</x-layout>