<x-layout>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    {{-- @foreach ($employees as $employee) --}}


    <x-slot:heading>
       Staff Details
    </x-slot:heading>

    <div
    class="block overflow-hidden rounded-lg border w-1/4 border-gray-100 lg:p-10"
  >
  
  
    <div class="sm:flex sm:justify-between sm:gap-10">
      <div>
        <h3 class="text-lg font-bold text-gray-900 lg:text-3xl">
          {{ $employees->first_name   ?? 'N/A'}} {{ $employees?->other_name}} {{ $employees->last_name  ?? 'N/A'}}
        </h3>
  
        <p class="mt-1 lg:text-xl text-lg font-medium text-blue-600">{{$employees->job_title ?? 'N/A'}}</p>
      </div>
    </div>
  
    <dl class="mt-6 flex justify-between gap-4 sm:gap-6">
    <div class="flex flex-col">
      <dt class="lg:text-xl text-lg font-medium text-gray-600">Employee Number</dt>
      <dd class="text-lg font-semibold text-blue-600">{{ $employees->employee_number  ?? 'N/A'}}</dd>
    </div>

    <div class="flex flex-col text-right">
        <dt class="lg:text-xl text-lg font-medium text-gray-600">Phone Number</dt>
        <dd class="text-lg font-semibold text-blue-600">{{ $employees->phone_number  ?? 'N/A'}}</dd>
    </div>
    </dl>
  
    <dl class="mt-6 flex justify-between gap-4 sm:gap-6">
      <div class="flex flex-col">
        <dt class="lg:text-xl text-lg font-medium text-gray-600">Email</dt>
        <dd class="text-lg font-semibold text-blue-600">{{ $employees->email  ?? 'N/A'}}</dd>
      </div>
  
      <div class="flex flex-col">
        <dt class="lg:text-xl text-lg font-medium text-gray-600">Department</dt>
        <dd class="text-lg font-semibold text-right text-blue-600 uppercase">{{ $employees->department->name ?? 'N/A' }}</dd>
      </div>
    </dl>

  </div>



</x-layout>