<x-layout>

    <x-slot:heading>
        Keys
    </x-slot:heading>


    <main class="p-10 flex-col flex gap-4">
            @if(\App\Models\User::hasPermission(auth()->id(), 'keys', 'view'))
            <div class="flex justify-end">
                <a href="{{ url('pick-key') }}" class="bg-red-600 text-white rounded-lg px-3 py-2">Log Key</a>
            </div>

            @endif
        <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Key</th>
                <th scope="col" class="px-6 py-3">Picked By</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Date/Time picked</th>
                <th scope="col" class="px-6 py-3">Returned by</th>
                <th scope="col" class="px-6 py-3">Date/Time returned</th>
                <th class="px-6 py-6" scope="col"></th>
            </tr>
        </thead>
        <tbody class="text-base">
            @foreach ($keys as $event)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event->key?->key_name }}</th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $event?->employee?->first_name}} {{ $event?->employee?->last_name }}</th>
                    <td class="px-6 py-4 capitalize">
                    
                    @switch($event->status)
                        @case('picked')
                            <span class="text-green-600">{{ $event->status }}</span>
                            @break
                        @case('returned')
                        <span class="text-red-600">{{ $event->status }}</span>
                        @break
                    
                        @default
                            
                    @endswitch
                    </td>
                    <td class="px-6 py-4">{{ $event->created_at}}</td>
                    <td class="px-6 py-4">
                        {{ $event->returned_at }}
                    </td>

                    <td class="px-3 py-4">
                        <a href="{{ url('submit-key/'. $event->id) }}" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Submit Key</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </main>
    
</x-layout>