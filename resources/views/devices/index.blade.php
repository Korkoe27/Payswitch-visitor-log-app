<x-layout>

    <x-slot:heading>
        Devices
    </x-slot:heading>




<div id="device-table" class="w-full flex sm:rounded-lg p-10 flex-col gap-5">
    @if(\App\Models\User::hasPermission(auth()->id(), 'visits', 'create'))

    <div class="flex justify-end ">
        <a href="{{url('log')}}" class="flex bg-green-900 rounded-md items-center text-white py-2 px-3 gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          Log Device
        </a>
    </div>
   
    @endif
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Serial Number</th>
                <th scope="col" class="px-6 py-3">Brand</th>
                <th scope="col" class="px-6 py-3">Staff</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Time</th>
                <th class="px-6 py-6" scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-base">
            @foreach ($devices as $device)
            <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $device->serial_number }}</th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $device->device_brand }} </th>
                <td class="px-6 py-4 uppercase">
                    {{ $device->employee?->first_name }} {{ $device->employee?->last_name }}
                </td>
                <td class="px-6 py-4">{{ $device->created_at?->format('d, M Y') }}</td>
                <td class="px-6 py-4">{{ $device->created_at?->format('H:i') }}</td>
                <td class="px-3 py-4">
                    @if ($device->action === 'bringDevice')
                        <button form="signOutForm" type="submit" class="signOutDeviceBtn font-medium text-blue-500 p-[5px] rounded-lg border border-blue-400"">Sign Out</button>
                    @elseif ($device->action === 'takeDeviceHome')
                        <button  form="signOutForm" href="#" class="font-medium text-green-500 p-[5px] rounded-lg border border-green-400">Return Device</button>
                    @endif
                </td>
            </tr>
<form action="{{ url('sign-out-device/'. $device->id) }}" id="signOutForm" method="post" class="hidden">
    @csrf
    @method('PATCH')

</form>
            @endforeach
        </tbody>
    </table>
</div> 


</x-layout>