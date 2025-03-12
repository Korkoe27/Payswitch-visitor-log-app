<x-layout>

    <x-slot:heading>
        Devices
    </x-slot:heading>




<div id="device-table" class="w-full sm:rounded-lg m-4">
    <table class="w-full text-sm text-left text-gray-500">
        <div class="flex justify-between px-8 w-full m-auto">
        <h2 class="font-bold">Devices</h2>

            <a class="border p-4 rounded-lg" href='{{url('log')}}'>Log Device</a>

        </div>
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