<x-layout>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    {{-- @foreach ($employees as $employee) --}}


    <x-slot:heading>
        Create a new Staff.
    </x-slot:heading>

    <aside class="">
        <form action="{{url('store-staff')}}" method="POST">
            @csrf

            <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                   <label for="first_name" class="mb-[10px] block text-base font-medium text-black">
                   First Name
                   </label>
                   <input type="text" placeholder="John" id="first_name" name="first_name" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                </div>
                {{-- @error('vehicle_number')
                <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                @enderror --}}
             </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                   <label for="last_name" class="mb-[10px] block text-base font-medium text-black">
                   Last Name
                   </label>
                   <input type="text" placeholder="Doe" id="last_name" name="last_name" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                </div>
                {{-- @error('vehicle_number')
                <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                @enderror --}}
             </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                   <label for="employee_number" class="mb-[10px] block text-base font-medium text-black">
                   Employee Number
                   </label>
                   <input type="text" placeholder="GR 1000 25" id="employee_number" name="employee_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                </div>
                {{-- @error('vehicle_number')
                <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                @enderror --}}
             </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                   <label for="employee_number" class="mb-[10px] block text-base font-medium text-black">
                   Employee Number
                   </label>
                   <input type="text" placeholder="GR 1000 25" id="employee_number" name="employee_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                </div>
                {{-- @error('vehicle_number')
                <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                @enderror --}}
             </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                <div class="mb-12">
                   <label for="phone_number" class="mb-[10px] block text-base font-medium text-black">
                   Employee Number
                   </label>
                   <input type="text" placeholder="GR 1000 25" id="employee_number" name="employee_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                </div>
                {{-- @error('vehicle_number')
                <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                @enderror --}}
             </div>
        </form>
    </aside>





</x-layout>