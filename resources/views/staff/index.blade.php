<x-layout>

    <x-slot:heading>
        Staff
    </x-slot:heading>

    @if(\App\Models\User::hasPermission(auth()->id(), 'staff', 'create'))


    <div class="flex justify-self-end p-10 ">
        <a href="{{url('create-staff')}}" class="bg-gradient-to-b px-10 text-xl flex items-center rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]"><svg xmlns="http://www.w3.org/2000/svg" fill="#fff" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          New Staff</a>
    </div>
  @endif
    <div class=" overflow-x-auto sm:rounded-lg p-10">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-black uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 lg:text-xl py-3">
                    Name
                    </th>
                    <th scope="col" class="px-6 lg:text-xl py-3">
                        Dept
                    </th>
                    <th scope="col" class="px-6 lg:text-xl py-3">
                        Role
                    </th>

                    <th className="px-6 py-6 lg:text-xl">
                      Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($employees as $staff)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <!-- Full Name -->
                        <th scope="row" class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                            {{ $staff?->first_name }} {{ $staff?->last_name }}
                        </th>
            
                        <!-- Department -->
                        <td class="px-6 py-4 text-black uppercase">
                            {{ $staff->department->name ?? 'N/A' }} <!-- Handle null department -->
                        </td>
            
                        <!-- Job Title -->
                        <td class="px-6 text-black py-4">
                            {{ $staff->job_title }}
                        </td>
            
                        <!-- View Link -->
                        <td class="px-6 py-4">
                            <a
                                class="font-medium text-blue-600 text-lg hover:underline"
                                href="{{ url('staff/' . $staff->id) }}"
                            >
                                View
                            </a>
                        </td>
                        {{-- @if(\App\Models\User::hasPermission(auth()->id(), 'staff', 'create'))
                        <!-- Assign Role -->
                        <td class="px-3 py-4">
                            <a href="#" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">
                                Assign Role
                            </a>
                        </td>

                        @endif --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-6 py-4 text-blue-200">
            {{ $employees->links() }}
          </div>

    </div>
{{-- 
<div class="bg-white text-center">
    <div
      class="mb-12 inline-flex justify-center rounded bg-white p-3 shadow-[0px_1px_3px_0px_rgba(0,0,0,0.13)] dark:bg-dark-2"
    >
      <ul
        class="inline-flex overflow-hidden rounded-lg border border-stroke dark:border-white/5"
      >
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10 text-black dark:hover:bg-white/5"
          >
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M17.5 9.8125H4.15625L9.46875 4.40625C9.75 4.125 9.75 3.6875 9.46875 3.40625C9.1875 3.125 8.75 3.125 8.46875 3.40625L2 9.96875C1.71875 10.25 1.71875 10.6875 2 10.9688L8.46875 17.5312C8.59375 17.6562 8.78125 17.75 8.96875 17.75C9.15625 17.75 9.3125 17.6875 9.46875 17.5625C9.75 17.2812 9.75 16.8438 9.46875 16.5625L4.1875 11.2188H17.5C17.875 11.2188 18.1875 10.9062 18.1875 10.5312C18.1875 10.125 17.875 9.8125 17.5 9.8125Z"
                fill="currentColor"
              />
            </svg>
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            1
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            2
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            3
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            4
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            ...
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center border-r border-stroke px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            10
          </button>
        </li>
        <li>
          <button
            class="flex h-10 min-w-10 items-center justify-center px-2 text-base font-medium text-dark hover:bg-gray-2 dark:border-white/10  text-black dark:hover:bg-white/5"
          >
            <svg
              width="20"
              height="21"
              viewBox="0 0 20 21"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M18 10L11.5312 3.4375C11.25 3.15625 10.8125 3.15625 10.5312 3.4375C10.25 3.71875 10.25 4.15625 10.5312 4.4375L15.7812 9.78125H2.5C2.125 9.78125 1.8125 10.0937 1.8125 10.4688C1.8125 10.8438 2.125 11.1875 2.5 11.1875H15.8437L10.5312 16.5938C10.25 16.875 10.25 17.3125 10.5312 17.5938C10.6562 17.7188 10.8437 17.7812 11.0312 17.7812C11.2187 17.7812 11.4062 17.7188 11.5312 17.5625L18 11C18.2812 10.7187 18.2812 10.2812 18 10Z"
                fill="currentColor"
              />
            </svg>
          </button>
        </li>
      </ul>
    </div>
  </div> --}}




</x-layout>
