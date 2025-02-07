<x-layout>

    <x-slot:heading>
        All Keys   
    </x-slot:heading>



    <main class="">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    {{-- <th scope="col" class="px-6 py-3">Key Name</th> --}}
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($departments as $department)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap uppercase">{{ $department->name }}</th>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-500 text-lg hover:underline">View</a>
                        </td>
                        <td class="px-3 py-4">
                            <a href="#" class="font-medium text-white p-3 rounded-lg bg-red-400">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>



</x-layout>