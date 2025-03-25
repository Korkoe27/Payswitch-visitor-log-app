<x-layout>

    <x-slot:heading>
        All Keys   
    </x-slot:heading>



    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->id(), 'roles', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-key') }}" class="px-3 text-white py-2 rounded-md bg-green-500">Create New Key</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Role</th>
                    <th scope="col" class="px-6 text-lg py-3">Description</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($roles as $role)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base  font-medium text-gray-900 whitespace-nowrap">{{ $role->name }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ $role->description }} </th>
                        <td class="px-3 py-4">
                            <button type="button" data-key-id="{{ $role->id }}" data-key-name="{{ $role->name }}" onclick="confirmDelete({{ $role->id}})" class=" delete-btn font-medium text-lg text-white p-3 rounded-lg bg-red-400">Delete Key</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>
