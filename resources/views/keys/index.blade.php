<x-layout>

    <x-slot:heading>
        All Keys   
    </x-slot:heading>



    <main class="p-5">
        @if(\App\Models\User::hasPermission(auth()->id(), 'keys', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-key') }}" class="px-3 text-white py-2 rounded-md bg-green-500">Create New Key</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Key Number</th>
                    <th scope="col" class="px-6 text-lg py-3">Key Name</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($keys as $key)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base  font-medium text-gray-900 whitespace-nowrap">{{ $key->key_number }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ $key->key_name }} </th>
                        <td class="px-3 py-4">
                            <a href="#" class="font-medium text-lg text-white p-3 rounded-lg bg-red-400">Delete Key</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>



</x-layout>