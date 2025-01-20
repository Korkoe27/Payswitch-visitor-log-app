<x-layout>

    <x-slot:heading>
        Log your Device
    </x-slot:heading>


    <section class="">
        <form action="{{url('log-device')}}" method="POST">
            @csrf


            <div class="">
                <label for="serial_number" class="block text-sm font-medium text-slate-500">Serial Number</label>
                <div class="mt-1">
                    <input type="text" name="serial_number" id="serial_number" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>
            </div>
            <div class="">
                <label for="brand" class="block text-sm font-medium text-slate-500">Brand</label>
                <div class="mt-1">
                    <input type="text" name="device_brand" placeholder="MacBook" id="brand" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required>
                </div>
            </div>
            <div class="">
                <label for="employee_id" class="block text-sm font-medium text-slate-500">Who are you?</label>
                <div class="mt-1">
                <select name="employee_id" id="">
                    <option value="" selected disabled class="">Visitee</option>
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
                   @endforeach
                </select>
                </div>
            </div>
            <div class="">
                <label for="" class="block">What are you doing?</label>
                <div class="flex flex-col">
                    <label for="log" class="block text-sm font-medium text-slate-500">Taking a device home.
                    <input type="radio" name="action" value="log" id="log" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required></label>
                </div>
                <div class="flex flex-col">
                    <label for="return" class="block text-sm font-medium text-slate-500">Bringing your device to work.
                    <input type="radio" name="action" value="return" id="return" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" required></label>
                </div>
            </div>

            <button type="submit" class="border p-2 rounded-lg border-black">Submit</button>


        </form>
    </section>

















</x-layout>