<x-layout>

    <x-slot:heading>
        Sign Out
    </x-slot:heading>



    

    <div class="w-full md:w-1/2 my-4 flex mx-auto px-10 lg:w-1/3">
        <section class="flex lg:flex-row flex-col w-full">
            <aside class="flex flex-col m-auto py-10 gap-1 w-full" style="background-image: url('{{asset('ps-ext 1.png')}}')">
                <h2 class="font-bold text-white text-lg">{{$visitor->first_name}} {{$visitor->last_name}}</h2>
                <h3 class="text-white font-semibold text-base">Thank you for visiting PaySwitch</h3>
            </aside>
            <form action="" class="flex flex-col w-full">
                
            </form>

        </section>


    </div>


</x-layout>