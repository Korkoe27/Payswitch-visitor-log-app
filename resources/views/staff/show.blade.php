<x-layout>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    {{-- @foreach ($employees as $employee) --}}


    <x-slot:heading>
        {{ $employees->first_name  ?? 'New'}} {{ $employees->last_name  ?? 'User'}}
    </x-slot:heading>

            <div class="w-full ml-10">

                <section class="flex flex-col p-4">
                    {{-- <div class="flex flex-col gap-2"> --}}
                        <h2 class="text-black font-normal">Name: <span>{{ $employees->first_name   ?? 'N/A'}} {{ $employees->last_name  ?? 'N/A'}}</span></h2>
                    {{-- </div> --}}

                    <h2 class="">Employee Number: <span class="">{{ $employees->employee_number  ?? 'N/A'}}</span></h2>

                    <h2 class="">Email: <span class="">{{ $employees->email  ?? 'N/A'}}</span></h2>

                    <h2 class="">Department: <span class="uppercase">{{ $employees->department->name ?? 'N/A' }}</span></h2>

                    <h2 class="">Role: <span class="">{{$employees->job_title ?? 'N/A'}}</span></h2>

                    <h2 class="">Phone: <span class="">{{$employees->phone_number ?? 'N/A'}}</span></h2>

                    <h2 class="">Vehicle Number <span class="">{{$employees->vehicle_number ?? 'No Car'}}</span></h2>

                    
                </section>

    </div>
    {{-- @endfore  ach --}}



</x-layout>