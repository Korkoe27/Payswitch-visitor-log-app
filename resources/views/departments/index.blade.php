<x-layout>

    <x-slot:heading>
        All Departments   
    </x-slot:heading>



    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'departments', 'create'))
        <div class="flex justify-end">
            <a href="{{ url('create-department') }}" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4]">Create Department</a>
        </div>
        @endif
        <table class="w-full text-sm text-left text-gray-500" id="departments">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Name</th>
                    <th class="px-6 py-6" scope="col">Action</th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($departments as $department)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap uppercase">{{ $department->name }}</th>
                        <td class="px-3 py-4">
                            <a href="#" class="font-medium text-white p-3 rounded-lg bg-red-400">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>


    <script>
        $(document).ready(function() {
            $('#departments').DataTable();
        });
    </script>
</x-layout>