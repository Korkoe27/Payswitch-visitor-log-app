<x-layout>

    <x-slot:heading>
        Dashboard
    </x-slot:heading>

    
    

<div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <h2 class="font-bold p-4">Visitors</h2>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                   Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Visiting
                </th>
                <th scope="col" class="px-6 py-3">
                    Purpose
                </th>
                <th scope="col" class="px-6 py-3">
                    Time In
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ( $visitors as $visitor)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $visitor['name'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $visitor['visiting'] }}
                </td>
                <td class="px-6 py-4 capitalize">
                    {{ $visitor['purpose'] }}
                </td>
                <td class="px-6 py-4">
                    {{ $visitor['time_in'] }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600  hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach
            
 
        </tbody>
    </table>
</div>






</x-layout>