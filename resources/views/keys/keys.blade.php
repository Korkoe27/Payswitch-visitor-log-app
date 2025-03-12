<x-layout>

    <x-slot:heading>
        Keys
    </x-slot:heading>


    <main class="p-10 flex-col flex gap-4">
            @if(\App\Models\User::hasPermission(auth()->id(), 'keys', 'view'))
            <div class="flex justify-end">
                <a href="{{ url('create-visit') }}" class="bg-red-600 text-white rounded-lg px-3 py-2">Log Key</a>
            </div>

            @endif
        <table class="w-full text-sm text-left text-gray-500">
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

    </main>
    
</x-layout>