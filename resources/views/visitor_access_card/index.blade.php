<x-layout>

    <x-slot:heading>
        Visitor Access Cards
    </x-slot:heading>

    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->id(), 'staff', 'create'))

        <div class="flex justify-self-end md:px-6 ">
            <a href="{{url('create-access-card')}}" class="flex bg-green-900 w-full rounded-md items-center text-white md:p-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              Create New Card
            </a>
        </div>
       
        @endif
    
        <div class=" overflow-x-auto shadow-md sm:rounded-lg m-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 text-lg py-3">
                        ID
                        </th>
                        <th scope="col" class="px-6 text-lg py-3">
                            Created at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Role
                        </th> --}}
    
                        <th className="px-6 py-6" scope="col">
    
                        </th>
                    </tr>
                </thead>
                <tbody class="text-base">
                    @foreach ($visitorAccessCards as $card)
                        <tr class="odd:bg-white even:bg-gray-50 border-b">
                            <!-- Full Name -->
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $card?->card_number }}
                            </th>
                
                            <!-- Department -->
                            <td class="px-6 py-4 uppercase">
                                {{ $card?->created_at?->format('Y-m-d') }} <!-- Handle null department -->
                            </td>
                
                            <!-- Job Title -->
    
                            @switch($card['status'])
                            @case('available')
                            <td class="px-6 capitalize text-green-600 py-4">
                                {{ $card['status'] }}
                                
                            </td>@break
                            @case('unavailable')
                            <td class="px-6 capitalize text-yellow-600 py-4">
                                {{ $card['status'] }}
                            </td>
                            @break
                             @endswitch
                
                            <!-- View Link -->
                            <td class="px-6 py-4">
                                <a
                                    class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400"
                                    href="#"
                                >
                                    Delete
                                </a>
                            </td>
    {{--             
                            <!-- Assign Role -->
                            <td class="px-3 py-4">
                                <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">
                                    Assign Role
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $visitorAccessCards->links() }}
              </div>
    
        </div>
    </main>
 





</x-layout>
