<x-layout>

    <x-slot:heading>
        All Users
    </x-slot:heading>



    
    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-user') }}" class="px-3 text-white py-2 rounded-md bg-green-500">Create New User</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg lg:text-xl py-3">Name</th>
                    <th scope="col" class="px-6 text-lg lg:text-xl py-3">Role</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base lg:text-xl font-medium text-gray-900 whitespace-nowrap">{{ $user->name }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 lg:text-lg whitespace-nowrap">{{ $user->role->name }} </th>
                        <td class="px-3 py-4">
                            <button type="button" 
                            {{-- data-key-id="{{ $key->id }}" data-key-name="{{ $key->key_name }}"  --}}
                            {{-- onclick="confirmDelete({{ $key->id}})"  --}}
                            class=" bg-gradient-to-b px-5 w-fit text-xl rounded-lg py-2 text-white 
                      from-red-500 to-red-700 flex items-center"
                            >Delete User</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>


</x-layout>