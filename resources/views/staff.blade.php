<x-layout>

    <x-slot:heading>
        Staff
    </x-slot:heading>



    <div class="flex justify-self-end md:px-6 ">
        <button class="flex border border-black w-full rounded-md md:p-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          New Staff</button>
    </div>
   
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

                    <th className="px-6 py-6" scope="col">

                    </th>
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
                        {{ $staff->department->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $staff['job_title'] }}
                    </td>
                    <td class="px-6 py-4">
                        <a
                        class="font-medium text-blue-600 text-lg hover:underline" 
                        {{-- onclick="openModal({{ json_encode($staff) }})"
                         --}}
                        href="{{ url('staff/{id}') }}"
                        >
                        View
                     </a>

                    </td>
                    <td class="px-3 py-4">
                        <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg  border border-red-400">Assign Role</a>
                    </td>
                </tr>
                @endforeach
                
    
            </tbody>
        </table>
    </div>

    {{-- <div id="staffModal" class="hidden flex fixed inset-0 bg-black bg-opacity-50 backdrop-blur-[2px]  items-center justify-center">
        <dialog class="flex flex-col gap-4 rounded-lg bg-white m-auto w-1/2 p-6">
            <section class="flex flex-col m-auto gap-4">
                <h2 class="text-black font-normal">Name: <span id="modalName"   class="font-bold text-blue-600"></span></h2>
                <h2>Email: <span id="modalEmail"   class="font-bold text-blue-600"></span></h2>
                <h2>Department: <span id="modalDepartment"   class="font-bold text-blue-600"></span></h2>
                <h2>Role: <span id="modalRole"   class="font-bold text-blue-600"></span></h2>
                <h2>Phone: <span id="modalPhone"   class="font-bold text-blue-600"></span></h2>
            </section>
            <button onclick="closeModal()" class="m-auto  w-1/4 bg-blue-300 text-white px-4 py-2 rounded hover:bg-blue-600">
                Close
            </button>
        </dialog>
    </div> --}}


</x-layout>
