<x-layout>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    {{-- @foreach ($employees as $employee) --}}


    <x-slot:heading>
        {{ $employees->first_name   ?? 'N/A'}} {{ $employees?->other_name}} {{ $employees->last_name  ?? 'N/A'}}
    </x-slot:heading>

    <div
    class="block overflow-hidden rounded-lg border w-1/4 border-gray-100 sm:p-6 lg:p-8"
  >
  
  
    <div class="sm:flex sm:justify-between sm:gap-10">
      <div>
        <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
          {{ $employees->first_name   ?? 'N/A'}} {{ $employees?->other_name}} {{ $employees->last_name  ?? 'N/A'}}
        </h3>
  
        <p class="mt-1 text-xs font-medium text-blue-600">{{$employees->job_title ?? 'N/A'}}</p>
      </div>
  
      <div class="hidden sm:block sm:shrink-0">
        <img
          alt=""
          src="{{asset('profile.svg')}}"
          class="size-16 rounded-lg object-cover shadow-sm"
        />
      </div>
    </div>
  
    <dl class="mt-6 flex justify-between gap-4 sm:gap-6">
    <div class="flex flex-col">
      <dt class="text-sm font-medium text-gray-600">Employee Number</dt>
      <dd class="text-lg font-semibold text-blue-600">{{ $employees->employee_number  ?? 'N/A'}}</dd>
    </div>
    <div class="flex flex-col text-right">
        <dt class="text-sm font-medium text-gray-600">Phone Number</dt>
        <dd class="text-lg font-semibold text-blue-600">{{ $employees->phone_number  ?? 'N/A'}}</dd>
    </div>
    </dl>
  
    <dl class="mt-6 flex justify-between gap-4 sm:gap-6">
      <div class="flex flex-col">
        <dt class="text-sm font-medium text-gray-600">Email</dt>
        <dd class="text-lg font-semibold text-blue-600">{{ $employees->email  ?? 'N/A'}}</dd>
      </div>
  
      <div class="flex flex-col">
        <dt class="text-sm font-medium text-gray-600">Department</dt>
        <dd class="text-lg font-semibold text-right text-blue-600 uppercase">{{ $employees->department->name ?? 'N/A' }}</dd>
      </div>
    </dl>

    <dl class="mt-6 flex justify-between gap-4 sm:gap-6">
        <div class="flex flex-col">
            <dt class="text-sm font-medium text-gray-600">Vehicle Number</dt>
            <dd class="text-lg font-semibold text-blue-600">{{$employees->vehicle_number ?? 'No Car'}}</dd>
        </div>
        {{-- <div class="flex flex-col">

        </div> --}}
    </dl>
  </div>
    {{-- @endfore  ach --}}



</x-layout>
{{-- 
<div
  class="relative block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8"
>


  <div class="sm:flex sm:justify-between sm:gap-4">
    <div>
      <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
        {{ $employees->first_name   ?? 'N/A'}} {{ $employees?->other_name}} {{ $employees->last_name  ?? 'N/A'}}
      </h3>

      <p class="mt-1 text-xs font-medium text-gray-600">{{$employees->job_title ?? 'N/A'}}</p>
    </div>

    <div class="hidden sm:block sm:shrink-0">
      <img
        alt=""
        src="{{asset('profile.svg')}}"
        class="size-16 rounded-lg object-cover shadow-sm"
      />
    </div>
  </div>

  <div class="mt-4">
    <p class="text-pretty text-sm text-gray-500">{{ $employees->employee_number  ?? 'N/A'}}</p>
    <p class=""></p>
  </div>

  <dl class="mt-6 flex gap-4 sm:gap-6">
    <div class="flex flex-col-reverse">
      <dt class="text-sm font-medium text-gray-600">{{ $employees->email  ?? 'N/A'}}</dt>
      <dd class="text-xs text-gray-500">{{ $employees->employee_number  ?? 'N/A'}}</dd>
    </div>

    <div class="flex flex-col-reverse">
      <dt class="text-sm font-medium text-gray-600">{{ $employees->department->name ?? 'N/A' }}</dt>
      <dd class="text-xs text-gray-500">{{$employees->vehicle_number ?? 'No Car'}}</dd>
    </div>
  </dl>
</div> --}}