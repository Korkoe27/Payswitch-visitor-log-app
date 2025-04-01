<x-layout>

    <x-slot:heading>
        Keys
    </x-slot:heading>


    <main class="p-10 flex-col flex gap-4">
            @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'view'))
            <div class="flex justify-end">
                <a href="{{ url('pick-key') }}" class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]">Log Key</a>
            </div>

            @endif
        <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 lg:text-lg py-3">Key</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Picked By</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Status</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Date/Time picked</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Returned by</th>
                <th scope="col" class="px-6 lg:text-lg py-3">Date/Time returned</th>
                <th class="px-6 py-6" scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-base">
            @foreach ($keys as $event)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event->key?->key_name ?? "Deleted" }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event?->employee?->first_name}} {{ $event?->employee?->last_name }}</th>
                    <td class="px-6 py-4 capitalize">
                    
                    @switch($event?->status)
                        @case('picked')
                            <span class="text-green-600">{{ $event?->status }}</span>
                            @break
                        @case('returned')
                        <span class="text-red-600">{{ $event?->status }}</span>
                        @break
                    
                        @default
                            
                    @endswitch
                    </td>
                    @php
                    $employee = \App\Models\Employee::find($event->returned_by);
                @endphp
                    <td class="px-6 py-4 text-lg text-black">{{ $event?->created_at}}</td>
                    <td class="px-6 py-4 text-lg text-black">{{ $employee ? $employee->first_name . " " . $employee->last_name : 'Not Submitted yet'}}</td>
                    <td class="px-6 py-4 text-lg text-black">
                        {{ $event?->returned_at ?? "Not Submitted yet" }}
                    </td>

                    @if ($event?->status === 'picked')
                    <td class="px-3 py-4">
                        <a href="{{ url('submit-key/'. $event?->id) }}"  class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Submit Key</a>
                    </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>

    </main>
    
</x-layout>