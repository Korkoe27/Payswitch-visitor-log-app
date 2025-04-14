<x-layout>

    <x-slot:heading>
        Log your Device
    </x-slot:heading>


    <section class="p-10">
        <form action="{{url('log-device')}}" class="lg:w-1/3 w-1/2 flex flex-col space-y-10" method="POST">
            @csrf


            <div class="space-y-4">
                <label for="serial_number" class="font-semibold text-gray-900 text-base">Serial Number <span class="text-red-400">*</span></label>
                <div class="mt-1">
                    <input type="text" name="serial_number" id="serial_number" placeholder="5ECHOE44EKND" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500" required>
                </div>
            </div>
            <div class="space-y-4">
                <label for="brand" class="font-semibold text-gray-900 text-base">Brand <span class="text-red-400">*</span></label>
                <div class="mt-1">
                    <input type="text" name="device_brand" placeholder="MacBook" id="brand" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500" required>
                </div>
            </div>
            <div class="space-y-4">
                <label for="employee_id" class="font-semibold text-gray-900 text-base">Who are you? <span class="text-red-400">*</span></label>
                <div class="mt-1">
                <select name="employee_id" id="" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500" required>
                    <option value="" selected disabled class="">Staff</option>
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
                   @endforeach
                </select>
                </div>
            </div>

              
<h3 class="text-xl font-medium text-gray-900">What are you doing? <span class="text-red-400">*</span></h3>
<ul class="grid w-full gap-6 md:grid-cols-2">
    <li>
        <input type="radio" id="hosting-small" name="action" value="takeDeviceHome" class="hidden peer" required />
        <label for="hosting-small" class="inline-flex items-center justify-between w-full px-5 py-6 text-black bg-white border border-gray-400 rounded-lg cursor-pointer   peer-checked:border-blue-600  peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">                           
            <div class="block">
                {{-- <div class="w-full text-lg font-semibold">0-50 MB</div> --}}
                <div class="w-full">Taking a device home.</div>
            </div>
        </label>
    </li>
    <li>
        <input type="radio" id="hosting-big" name="action" value="bringDevice" class="hidden peer">
        <label for="hosting-big" class="inline-flex items-center justify-between w-full px-5 py-6 text-black bg-white border border-gray-400 rounded-lg cursor-pointer  peer-checked:border-blue-600  peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 ">
            <div class="block">
                {{-- <div class="w-full text-lg font-semibold">500-1000 MB</div> --}}
                <div class="w-full">Bringing your device to work.</div>
            </div>
        </label>
    </li>
</ul>


            <button type="submit" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4] w-fit">Log Device</button>


        </form>
    </section>



</x-layout>
