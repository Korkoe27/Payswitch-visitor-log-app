<x-layout>

    <x-slot:heading>
        Logs  
    </x-slot:heading>



    <main class="">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">User</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                    <th scope="col" class="px-6 py-3">Date</th>
                    <th scope="col" class="px-6 py-3">Time</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($logs as $log)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $log->user->name }}</th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $log->action }} </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $log->created_at?->format('Y/m/d') }} </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $log->created_at?->format('H:i') }} </th>

                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>



</x-layout>