<x-layout>

    <x-slot:heading>
        Log your Device
    </x-slot:heading>


    <section class="p-10">
        <form action="{{url('log-device')}}" class="w-1/4 felx flex-col space-y-10 lg:px-10" method="POST">
            @csrf


            <div class="space-y-4">
                <label for="serial_number" class="font-semibold text-gray-900 text-base">Serial Number</label>
                <div class="mt-1">
                    <input type="text" name="serial_number" id="serial_number" placeholder="5ECHOE44EKND" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500" required>
                </div>
            </div>
            <div class="space-y-4">
                <label for="brand" class="font-semibold text-gray-900 text-base">Brand</label>
                <div class="mt-1">
                    <input type="text" name="device_brand" placeholder="MacBook" id="brand" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500" required>
                </div>
            </div>
            <div class="space-y-4">
                <label for="employee_id" class="font-semibold text-gray-900 text-base">Who are you?</label>
                <div class="mt-1">
                <select name="employee_id" id="" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-blue-500 active:border-blue-500">
                    <option value="" selected disabled class="">Staff</option>
                    @foreach ($employees as $employee)
                    <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
                   @endforeach
                </select>
                </div>
            </div>


            <fieldset class="space-y-4">
                <legend class="">What are you doing?</legend>
              
                <div>
                  <label
                    for="DeliveryStandard"
                    class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500"
                  >
                    <div>
                      <p class="text-gray-700">Taking a device home.</p>
              
                      {{-- <p class="mt-1 text-gray-900">Free</p> --}}
                    </div>
              
                    <input
                      type="radio"
                      name="action"
                      value="takeDeviceHome"
                      id="log"
                      class="size-5 border-gray-300 text-blue-500"
            
                    />
                  </label>
                </div>
              
                <div>
                  <label
                    for="DeliveryPriority"
                    class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500"
                  >
                    <div>
                      <p class="text-gray-700">Bringing your device to work.</p>
              
                      {{-- <p class="mt-1 text-gray-900">£9.99</p> --}}
                    </div>
              
                    <input
                      type="radio"
                      name="action"
                      value="bringDevice"
                      id="bringDevice"
                      class="size-5 border-gray-300 text-blue-500"
                    />
                  </label>
                </div>
              </fieldset>

            <button type="submit" class="bg-blue-400 rounded-md inline-flex items-center justify-center py-3 px-7 text-center text-base font-medium text-white hover:bg-[#1B44C8] hover:border-[#1B44C8]  active:bg-[#1B44C8] active:border-[#1B44C8]">Submit</button>


        </form>
    </section>

















</x-layout>


{{-- <fieldset class="space-y-4">
    <legend class="sr-only">What are you doing?</legend>
  
    <div>
      <label
        for="DeliveryStandard"
        class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500"
      >
        <div>
          <p class="text-gray-700">Taking a device home.</p>
  
          <p class="mt-1 text-gray-900">Free</p>
        </div>
  
        <input
          type="radio"
          name="action"
          value="log"
          id="log"
          class="size-5 border-gray-300 text-blue-500"
          checked
        />
      </label>
    </div>
  
    <div>
      <label
        for="DeliveryPriority"
        class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500"
      >
        <div>
          <p class="text-gray-700">Bringing your device to work.</p>
  
          <p class="mt-1 text-gray-900">£9.99</p>
        </div>
  
        <input
          type="radio"
          name="action"
          value="bringDevice"
          id="bringDevice"
          class="size-5 border-gray-300 text-blue-500"
        />
      </label>
    </div>
  </fieldset> --}}