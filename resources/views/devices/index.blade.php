<x-layout>

    <x-slot:heading>
        Devices
    </x-slot:heading>




<div id="device-table" class="w-full flex sm:rounded-lg p-10 flex-col gap-5">
    @if(\App\Models\Roles::hasPermission(auth()->id(), 'visits', 'create'))

    <div class="flex justify-end ">
        <a href="{{url('log')}}" class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4] flex items-center">
          Log Device
        </a>
    </div>
   
    @endif
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 lg:text-lg py-3">Serial Number</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Brand</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Staff</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Date</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Time</th>
                <th class="px-6 py-6" scope="col">Action</th>
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

                @if (!($device?->status === 'returned' || $device?->status === 'signed_out'))
                    
                <td class="px-3 py-4">
                    @if ($device->action === 'bringDevice')
                        <button form="signOutForm" type="submit" class="signOutDeviceBtn font-medium text-blue-500 p-[5px] rounded-lg border border-blue-400"">Sign Out</button>
                    @elseif ($device->action === 'takeDeviceHome')
                        <button  form="signOutForm" href="#" class="font-medium text-green-500 p-[5px] rounded-lg border border-green-400">Return Device</button>
                    @endif
                </td>
                @endif
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