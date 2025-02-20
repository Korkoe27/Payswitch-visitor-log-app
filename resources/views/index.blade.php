<x-layout>

    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    <dialog id="signOutDialog" class="absolute left-0 right-0 backdrop:bg-black/50 bottom-0 top-0 w-fit h-fit p-10">
        <div class="bg-white/10 flex-col flex gap-4">
            <h1 class="text-center">Sign Out Device</h1>
            <form action="" class="flex-col flex gap-4 justify-between" method="POST">
                @method('PATCH')
                @csrf
                <p class="">Are you sure you want to sign out this device?</p>
                <div class="flex justify-between">
                    <button type="button" id="cancelSignoutBtn" class="border border-red-300 text-red-500 rounded px-5 py-3">Cancel</button>
                    <button type="submit" class="bg-blue-400 text-white rounded-lg px-5 py-3">Sign Out</button>
                </div>
            </form>
        </div>
        
    </dialog>

    <div class="flex px-10">
        <button id="visitors-btn" class="text-black lg:w-32 bg-white border-t-0 border rounded-t-none rounded-r-none rounded-b rounded-br text-sm flex items-center gap-2 lg:px-5 lg:py-2 shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
            Visitors
        </button>
        <button id="keys-btn" class="text-black lg:w-32 text-sm bg-white  lg:px-5 lg:py-2 border border-t-0 rounded-t-none rounded-r-none rounded-b rounded-br flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
            </svg>
            Keys
        </button>
        <button id="device-btn" class="text-black lg:w-32 text-sm bg-white  lg:px-5 lg:py-2 border border-t-0 rounded-t-none rounded-r-none rounded-b rounded-br flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
              </svg>
            Devices
        </button>
    </div>

    <div id="visitors-table" class="sm:rounded-lg m-4">
        <table class="w-full text-sm text-left text-gray-500">
            <h2 class="font-bold p-4">Visitors</h2>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Visiting</th>
    <th scope="col" class="px-6 py-3">Purpose</th>
                    <th scope="col" class="px-6 py-3">Time In</th>
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($visitor as $person)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $person['first_name'] }} {{ $person['last_name'] }}</th>
                        <td class="px-6 py-4">{{ $person->visitee ? $person->visitee->first_name . ' ' . $person->visitee->last_name : 'N/A' }}</td>
                        <td class="px-6 py-4 capitalize">
                            @switch($person['purpose'])
                                @case('personal')
                                    <span class="text-green-500 ">{{ $person['purpose'] }}</span>
                                    @break
                                @case('interview')
                                    <span class="text-yellow-500">{{ $person['purpose'] }}</span>
                                    @break
                                @case('official')
                                    <span class="text-red-600">{{ $person['purpose'] }}</span>
                                    @break
                                @default
                                    <span class="text-blue-600">{{ $person['purpose'] }}</span>
                            @endswitch
                        </td>
                        <td class="px-6 py-4">{{ $person?->created_at?->format('H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ url('visit/' . $person->id) }}" class="font-medium text-blue-600 text-lg hover:underline">View</a>
                        </td>
                        <td class="px-3 py-4">
                            {{-- <a href="{{ url('departure/'.$person->id) }}" 
                                class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">
                                Sign Out
                             </a> --}}
                            <a href="departure?visitor={{base64_encode($person->id)}}" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Sign Out</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
<div class="px-6 py-4">
    {{ $visitor->links() }}
</div> 

   
<div id="departed-table" class="sm:rounded-lg m-4">
    <table class="w-full text-sm text-left text-gray-500">
        <h2 class="font-bold p-4">completed Visits</h2>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Visiting</th>
<th scope="col" class="px-6 py-3">Purpose</th>
                {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                <th scope="col" class="px-6 py-3">Time Out</th>
                <th class="px-6 py-6" scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-base">
            @foreach ($departed as $person)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $person['first_name'] }} {{ $person['last_name'] }}</th>
                    <td class="px-6 py-4">{{ $person->visitee ? $person->visitee->first_name . ' ' . $person->visitee->last_name : 'N/A' }}</td>
                    <td class="px-6 py-4 capitalize">
                        @switch($person['purpose'])
                            @case('personal')
                                <span class="text-green-500 ">{{ $person['purpose'] }}</span>
                                @break
                            @case('interview')
                                <span class="text-yellow-500">{{ $person['purpose'] }}</span>
                                @break
                            @case('official')
                                <span class="text-red-600">{{ $person['purpose'] }}</span>
                                @break
                            @default
                                <span class="text-blue-600">{{ $person['purpose'] }}</span>
                        @endswitch
                    </td>
                    {{-- <td class="px-6 py-4">{{ $person?->created_at?->format('H:i') }}</td> --}}
                    <td class="px-6 py-4">{{ date_format(date_create($person?->departed_at),'H:i') }}</td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 text-lg hover:underline">View</a>
                    </td>
                    <td class="px-3 py-4">
                        {{-- <a href="{{ url('departure/'.$person->id) }}" 
                            class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">
                            Sign Out
                         </a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div class="px-6 py-4">
{{ $visitor->links() }}
</div> 
</div>

    </div>

    <div id="keys-table" class="w-full hidden sm:rounded-lg m-4">
        <table class="w-full text-sm text-left text-gray-500">
            <h2 class="font-bold p-4">Keys</h2>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Key</th>
                    <th scope="col" class="px-6 py-3">Picked By</th>
                    <th scope="col" class="px-6 py-3">Time In</th>
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($keys as $event)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event->key?->key_name }}</th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event?->employee?->first_name}} {{ $event?->employee?->last_name }}</th>
                        <td class="px-6 py-4">{{ $event->created_at->format('H:i')}}</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-500 text-lg hover:underline">View</a>
                        </td>
                        <td class="px-3 py-4">
                            <a href="{{ url('submit-key/'. $event->id) }}" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Submit Key</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
{{--  
        {{ $key->pickedByEmployee ? $key->pickedByEmployee->first_name . ' ' . $key->pickedByEmployee->last_name : 'N/A' }} --}}
    </div> 
    <div id="device-table" class="w-full hidden sm:rounded-lg m-4">
        <table class="w-full text-sm text-left text-gray-500">
            <div class="flex justify-between px-8 w-full m-auto">
            <h2 class="font-bold">Devices</h2>

                <a class="border p-4 rounded-lg" href='{{url('device-logs/create')}}'>Log Device</a>

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
                            <button onclick="signOutDevice()"   class="signOutDeviceBtn font-medium text-blue-500 p-[5px] rounded-lg border border-blue-400" data-device-id="{{ $device->id }}">Sign Out</button>
                        @elseif ($device->action === 'log')
                            <a href="#" class="font-medium text-green-500 p-[5px] rounded-lg border border-green-400">Return Device</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> 

<script src="{{ asset('/js/index.js') }}"></script>

</x-layout>

