<x-layout>

    <x-slot:heading>
        Visitors
    </x-slot:heading>

    
    

<div class=" overflow-x-auto shadow-md sm:rounded-lg m-4">
    <table class="w-full text-sm text-left text-gray-500">
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

                <th className="px-6 py-6" scope="col"></th>
            </tr>
        </thead>
        <tbody class=" text-base">

            @foreach ( $visitors as $visitor)
                <tr class="odd:bg-white even:bg-gray-50 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $visitor['name'] }}
                </th>
                <td class="px-6 py-4">
                    {{ $visitor['visiting'] }}
                </td>
                <td class="px-6 py-4 capitalize">
                    @switch($visitor['purpose'])
                        @case('personal')
                            <span class="text-green-500">{{ $visitor['purpose'] }}</span>
                            @break
                        @case('interview')
                            <span class="text-yellow-500">{{ $visitor['purpose'] }}</span>
                            @break
                        @case('official')
                            <span class="text-red-600">{{ $visitor['purpose'] }}</span>
                            @break
                        @default
                            <span class="text-blue-600">{{ $visitor['purpose'] }}</span>
                    @endswitch
                </td>
                <td class="px-6 py-4">
                    {{ $visitor['time_in'] }}
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium  text-blue-600  text-lg hover:underline ">View</a>
                </td>
                <td class="px-3 py-4">
                    <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg  border border-red-400">Sign Out</a>
                </td>
            </tr>
            @endforeach
            

        </tbody>
    </table>
</div>






</x-layout>
