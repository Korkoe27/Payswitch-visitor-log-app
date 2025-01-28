<x-layout>

    <x-slot:heading>
        Pick your Office Key
    </x-slot:heading>


    <aside class="">
        <form action="{{url('log-key')}}" class="" method="POST">

            @csrf
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="mb-12">
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
                      <select class="p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-1/2" name="key_name" required >
                            <option value="" selected disabled class="">What Key are you picking?</option>
                        @foreach ($keys as $key)
                         <option value="{{$key->key_name}}" class="text-black">{{$key->key_name}}</option>
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