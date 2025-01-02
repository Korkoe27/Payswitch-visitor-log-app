<x-layout>

    <x-slot:heading>
        Staff
    </x-slot:heading>


   
    <div class=" overflow-x-auto shadow-md sm:rounded-lg m-4">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                    Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dept
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>

                    <th className="px-6 py-6" scope="col"></th>
                </tr>
            </thead>
            <tbody class=" text-base">

                @foreach ( $employees as $staff)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $staff['first_name'] }}
                        {{ $staff['last_name'] }}
                    </th>
                    <td class="px-6 py-4 uppercase">
                        {{ $staff['department'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $staff['job_title'] }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium  text-blue-600  text-lg hover:underline ">View</a>
                    </td>
                    <td class="px-3 py-4">
                        <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg  border border-red-400">Assign Role</a>
                    </td>
                </tr>
                @endforeach
                
    
            </tbody>
        </table>
    </div>
`

</x-layout>