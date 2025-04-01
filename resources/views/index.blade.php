<x-layout>

    <x-slot:heading>
        Dashboard
    </x-slot:heading>


    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let title = 'Success!';
            let text = 'The operation completed successfully.';
            
            @if(session('success_type') == 'visitor_departure')
                title = 'Good Bye!';
                text = 'Thank you for visiting us today. We hope to see you again soon!';
            @elseif(session('success_type') == 'visitor_arrival')
                title = 'Welcome to PaySwitch!';
                text = 'We are happy to have you. Enjoy your visit';
            @elseif(session('success_type') == 'key_pickup')
                title = 'Key Logged!';
                text = 'The key pickup has been recorded successfully.';
            @elseif(session('success_type') == 'device_logged')
                title = 'Device Logged!';
                text = 'The device has been logged successfully.';
            @endif
            
            Swal.fire({
                title: title,
                text: text,
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirect to homepage after they dismiss the alert
                window.location.href = '{{ url("/") }}';
            });
        });
    </script>
    @endif

    

    @php
    $hour = now()->hour;

    if ($hour < 12) {
        $greeting = "Good Morning";
    } elseif ($hour < 18) {
        $greeting = "Good Afternoon";
    } else {
        $greeting = "Good Evening";
    }
@endphp  
    <h1 class="flex items-center p-10 gap-3">
        <span class="lg:text-4xl">{{ $greeting }} </span>
       <span class="text-[#0F51AE] rounded-full bg-[#F2F8FF] px-2 p-1 font-semibold">{{ Auth::user()->name  }}</span> 
    </h1>
    {{-- @if(true) --}}
    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'view'))
    <main class="flex-col flex">

    

        <div class="flex gap-10 h-fit flex-row p-10 lg:justify-between">
            <div  class="flex lg:h-full rounded-2xl bg-[#F2F8FF] w-full p-5 gap-6 flex-col justify-between">
                <h3 class="text-2xl  text-black/50 flex gap-2 items-center font-semibold">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current">
                        <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H6C4.93913 15 3.92172 15.4214 3.17157 16.1716C2.42143 16.9217 2 17.9391 2 19V21M22 21V19C21.9993 18.1137 21.7044 17.2528 21.1614 16.5523C20.6184 15.8519 19.8581 15.3516 19 15.13M16 3.13C16.8604 3.3503 17.623 3.8507 18.1676 4.55231C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89317 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Ongoing Visits
                </h3>
                
                <h1 class="">
                    <span class="lg:text-6xl font-bold text-5xl">{{ $visitor ? count($visitor) : 0 }}</span>
                </h1>

                <div class="flex justify-between gap-3 lg:gap-0">
                    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create'))
                <a href="{{ url('check-visitor') }}" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4]">Log Visitor</a>
                @endif
                    <a href="{{ url('visits') }}" class="flex items-center text-green-700 font-bold lg:text-xl text-lg">All visits

                        
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#15803D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </a>
   

                </div>
                    
            </div>
            <div class="flex lg:h-full rounded-2xl bg-[#F2F8FF] w-full p-5 gap-6 flex-col justify-between">
                <h3 class="text-2xl  text-black/50 flex gap-2 items-center font-semibold">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current">
                        <path d="M2.586 17.414C2.2109 17.789 2.00011 18.2976 2 18.828V21C2 21.2653 2.10536 21.5196 2.29289 21.7071C2.48043 21.8947 2.73478 22 3 22H6C6.26522 22 6.51957 21.8947 6.70711 21.7071C6.89464 21.5196 7 21.2653 7 21V20C7 19.7348 7.10536 19.4805 7.29289 19.2929C7.48043 19.1054 7.73478 19 8 19H9C9.26522 19 9.51957 18.8947 9.70711 18.7071C9.89464 18.5196 10 18.2653 10 18V17C10 16.7348 10.1054 16.4805 10.2929 16.2929C10.4804 16.1054 10.7348 16 11 16H11.172C11.7024 15.9999 12.211 15.7891 12.586 15.414L13.4 14.6C14.7898 15.0842 16.3028 15.0823 17.6915 14.5948C19.0801 14.1072 20.2622 13.1629 21.0444 11.9162C21.8265 10.6695 22.1624 9.19421 21.9971 7.73178C21.8318 6.26934 21.1751 4.90629 20.1344 3.86561C19.0937 2.82493 17.7307 2.16822 16.2683 2.00293C14.8058 1.83763 13.3306 2.17353 12.0839 2.95568C10.8372 3.73782 9.89279 4.91991 9.40525 6.30856C8.91771 7.69721 8.91585 9.2102 9.4 10.6L2.586 17.414Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.5 8.00004C16.7761 8.00004 17 7.77618 17 7.50004C17 7.2239 16.7761 7.00004 16.5 7.00004C16.2239 7.00004 16 7.2239 16 7.50004C16 7.77618 16.2239 8.00004 16.5 8.00004Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Picked Keys
                </h3>
                


                <h1 class="">
                    <span class="lg:text-6xl font-bold text-5xl">{{ $keys ? count($keys) : 0 }}</span>
                </h1>
                <div class="flex justify-between">
                    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create'))
                    <a href="{{ url('pick-key') }}" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4]">Log Key</a>
                    @endif
                    <a href="{{ url('keys') }}" class="flex items-center text-green-700 font-bold text-xl">Keys

                        
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#15803D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </a>
                </div>
            </div>
            <div class="flex lg:h-full rounded-2xl bg-[#F2F8FF] w-full p-5 gap-6 flex-col justify-between">
                <h3 class="text-2xl  text-black/50 flex gap-2 items-center font-semibold">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current">
                        <path d="M18 8V6C18 5.46957 17.7893 4.96086 17.4142 4.58579C17.0391 4.21071 16.5304 4 16 4H4C3.46957 4 2.96086 4.21071 2.58579 4.58579C2.21071 4.96086 2 5.46957 2 6V13C2 13.5304 2.21071 14.0391 2.58579 14.4142C2.96086 14.7893 3.46957 15 4 15H12M10 19V15.04V18.19M7 19H12M18 12H20C21.1046 12 22 12.8954 22 14V20C22 21.1046 21.1046 22 20 22H18C16.8954 22 16 21.1046 16 20V14C16 12.8954 16.8954 12 18 12Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Logged Devices
                </h3>
                
                <h1 class="lg:text-6xl font-bold text-5xl">{{ $devices ? count($devices) : 0 }}</h1>
                
                <div class="flex justify-between gap-1">
                    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create'))
                    <a href="{{ url('log') }}" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4]">Log Device</a>
                    @endif
                    <a href="{{ url('device-logs') }}" class="flex items-center text-green-700 font-bold lg:text-xl text-lg">Devices

                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="#15803D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>


    
    <div id="visitors-table" class="sm:rounded-lg p-10">
        <table class="w-full text-sm text-left text-gray-500">
            <h2 class="font-bold p-4 lg:text-2xl">Ongoing Visits</h2>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Visiting</th>
    <th scope="col" class="px-6 py-3">Purpose</th>
                    <th scope="col" class="px-6 py-3">Time In</th>
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>
            <tbody class="text-base">
                @foreach ($visitor as $person)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $person->full_name }}</th>
                        <td class="px-6 py-4">{{ $person->visitee ? $person->visitee->first_name . ' ' . $person->visitee->last_name : 'N/A' }}</td>
                        <td class="px-6 py-4 capitalize">
                            @switch($person['purpose'])
                                @case('personal')
                                    <span class="text-green-700 bg-green-200 py-1 px-2 rounded-2xl">{{ $person['purpose'] }}</span>
                                    @break
                                @case('interview')
                                    <span class="text-amber-600 bg-amber-100 py-1 px-2 rounded-2xl">{{ $person['purpose'] }}</span>
                                    @break
                                @case('official')
                                    <span class="text-red-600 bg-red-100 py-1 p-2 rounded-2xl">{{ $person['purpose'] }}</span>
                                    @break
                                @default
                                    <span class="text-blue-600 bg-blue-100 rounded-2xl py-1 px-2">{{ $person['purpose'] }}</span>
                            @endswitch
                        </td>
                        <td class="px-6 py-4">{{ $person?->created_at?->format('H:i') }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ url('visit/' . $person->id) }}" class="font-medium text-blue-600 text-lg hover:underline">View</a>
                        </td>

                        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'visits', 'create'))
                        <td class="px-3 py-4">
                            <a href="departure?visitor={{base64_encode($person->id)}}" class="font-medium text-red-500 p-[5px] rounded-lg border border-red-400">Sign Out</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
<div class="px-6 py-4">
    {{ $visitor->links() }}
</div> 


    </div>

    @endif



<script src="{{ asset('/js/index.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find all sign out links in the visitors table
        const signOutLinks = document.querySelectorAll('a[href^="departure?visitor="]');
        
        signOutLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Get visitor name from the same row
                const row = this.closest('tr');
                const visitorName = row.querySelector('th').innerText;
                
                // Show confirmation modal
                Swal.fire({
                    title: 'Sign Out Confirmation',
                    text: `Are you sure you want to sign out ${visitorName}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, sign out',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, proceed to the original URL
                        window.location.href = this.getAttribute('href');
                    }
                });
            });
        });
    });
</script>

</x-layout>

