<x-layout>

    <x-slot:heading>
        Keys
    </x-slot:heading>


   
    <div class=" overflow-x-auto shadow-md sm:rounded-lg m-4">
        <table class="w-full text-sm text-left text-gray-500">
        <h2 class="font-bold p-4">Keys</h2>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                    Staff
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Dept
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time In
                    </th>

                    <th className="px-6 py-6" scope="col"></th>
                </tr>
            </thead>
            <tbody class=" text-base">

                @foreach ( $keys as $key)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $key['staff'] }}
                    </th>
                    <td class="px-6 py-4 uppercase">
                        {{ $key['department'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $key['time in'] }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium  text-blue-600  text-lg hover:underline ">View</a>
                    </td>
                    <td class="px-3 py-4">
                        <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg  border border-red-400">Submit</a>
                    </td>
                </tr>
                @endforeach
                
    
            </tbody>
        </table>
    </div>
`

</x-layout>