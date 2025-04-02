<x-layout>
    <x-slot:heading>
        Visits
    </x-slot:heading>

    <div id="visitors-table" class="rounded-lg">
        <div class="flex bg-gray-50 p-10 justify-end">
            @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'staff', 'create'))
                <a href="{{ url('check-visitor') }}" class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]">Log Visitor</a>
            @endif
        </div>
            
        <div class="px-10">
        <table class="w-full text-left bg-gray-50 display  text-gray-500 px-10" id="visits">
            <thead class="text-xs text-gray-700 lg:p-10 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Name</th>
                    <th scope="col" class="px-6 text-lg py-3">Visiting</th>
                    <th scope="col" class="px-6 text-lg py-3">Purpose</th>
                    <th scope="col" class="px-6 text-lg py-3">Arrived</th>
                    <th scope="col" class="px-6 text-lg py-3">Departed</th>
                    <th scope="col" class="px-6 text-lg py-3"></th>
                    <th scope="col" class="px-6 text-lg py-3"></th>
                </tr>
            </thead>
            <tbody class="lg:text-lg bg-gray-50  text-black px-10">
                @foreach ($visitor as $person)
                    <tr class="odd:bg-white even:bg-gray-50 lg:p-10 lg:text-lg border-b">
                        <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $person?->full_name }}</td>
                        <td class="px-6 lg:text-xl py-4">{{ $person->visitee ? $person->visitee->first_name . ' ' . $person->visitee->last_name : 'N/A' }}</td>
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
                        <td class="px-6 text-left py-4 text-black">{{ $person?->created_at?->format('M, D Y : H:i') }}</td>
                        <td class="px-6 py-4 text-left text-black">
                            @if ($person?->departed_at === null)
                                <span class="text-red-600 font-medium lg:text-xl italic">Ongoing</span>
                            @else
                                {{ $person?->departed_at?->format('D, M Y : H:i') }}
                            @endif
                        </td>
                        <td class="px-3 py-4">
                            @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create') && $person->status === 'ongoing')
                                <a href="departure?visitor={{base64_encode($person->id)}}" class="font-medium underline-offset-4 text-red-500 rounded-lg underline">Sign Out</a>
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('visit/' . $person->id) }}" class="font-medium text-blue-600 text-lg hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        </div>
{{-- 
        <div class="px-6 py-4">
            {{ $visitor->links() }}
        </div> --}}
    </div>

    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#visits').DataTable();
            scrollX: true;
        });
    </script>
</x-layout>