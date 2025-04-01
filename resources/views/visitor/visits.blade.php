<x-layout>

    <x-slot:heading>
        Visits
    </x-slot:heading>


    <div id="visitors-table" class="rounded-lg  space-y-4  p-5">
        <table class="w-full text-left text-gray-500">

            @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'staff', 'create'))
            <div class="flex justify-end">
                <a href="{{ url('check-visitor') }}" class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]">Log Visitor</a>
                
            </div>
            @else

            
            @endif
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Name</th>
                    <th scope="col" class="px-6 text-lg py-3">Visiting</th>
                    <th scope="col" class="px-6 text-lg py-3">Purpose</th>
                    <th scope="col" class="px-6 text-lg py-3">Arrived</th>
                    <th scope="col" class="px-6 text-lg py-3">Departed</th>
                    <th class="px-6 text-lg py-6" scope="col">Action</th>
                </tr>
            </thead>
            <tbody class=" lg:text-lg  text-black">
                @foreach ($visitor as $person)
                    <tr class="odd:bg-white even:bg-gray-50 lg:text-lg border-b">
                        <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">{{ $person?->full_name }}</th>
                        <td class="px-6 lg:text-xl  py-4">{{ $person->visitee ? $person->visitee->first_name . ' ' . $person->visitee->last_name : 'N/A' }}</td>
                        <td class="px-6 py-4 capitalize">
                            @switch($person['purpose'])
                                @case('personal')
                                    <span class="text-green-800 px-2 py-1 rounded-xl bg-green-100">{{ $person->purpose }}</span>
                                    @break
                                @case('interview')
                                    <span class="text-amber-800 px-2 py-1 rounded-xl bg-amber-100">{{ $person->purpose }}</span>
                                    @break
                                @case('official')
                                    <span class="text-red-800 px-2 py-1 rounded-xl bg-red-100">{{ $person->purpose }}</span>
                                    @break
                                @default
                                    <span class="text-blue-800 px-2 py-1 rounded-xl bg-blue-100">{{ $person->purpose }}</span>
                            @endswitch
                        </td>
                        <td class="px-6 py-4 text-black">{{ $person?->created_at?->format('Y-m-d H:i') }}</td>
                        @if ($person->departed_at === null)
                            <td class="text-red-600 px-6 py-4 font-medium lg:text-xl italic">Ongoing</td>
                         @else
                        <td class="px-6 py-4 text-black">{{ $person?->departed_at?->format('Y-m-d H:i') }}</td>

                        
                            
                        @endif
                        <td class="px-6 py-4">
                            <a href="{{ url('visit/' . $person->id) }}" class="font-medium text-blue-600 text-lg hover:underline">View</a>
                        </td>

                        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create'))
                        @if ($person->status === 'ongoing')
                        <td class="px-3 py-4">

                            <a href="departure?visitor={{base64_encode($person->id)}}" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Sign Out</a>
                        </td>
                        @endif
                        @endif

                    </tr>
                @endforeach
            </tbody>


        </table>

<div class="px-6 py-4">
    {{ $visitor->links() }}
</div> 
    </div>


</x-layout>