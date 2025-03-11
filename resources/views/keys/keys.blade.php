<x-layout>

    <x-slot:heading>
        Keys
    </x-slot:heading>


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

</x-layout>