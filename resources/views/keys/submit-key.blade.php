<x-layout>

            {{-- {{ dd($keyEvent) }} --}}
    <x-slot:heading>
        Return Key
    </x-slot:heading>


    <main class="w-1/2 flex flex-col gap-4 p-10">
        <aside class="w-fit">
            <h4 class="text-xl font-light">You are returning the <span class="text-red-500 font-bold text-xl">{{$keyEvent->key()->first()->key_name}}</span> Key.</h4>
        </aside>
        <form action="{{ url('return-key/'.$keyEvent['id']) }}" class="flex w-1/2  gap-y-4 flex-col" method="POST">


            @csrf
            @method('PATCH')
            <h4 class="">Who are you?</h4>
            <select class="p-4 focus:border-blue-300 rounded-md outline-none text-blue-800 border border-gray-400 w-full" name="returned_by" required >
                <option value="" selected disabled class="">Find your name.</option>
            @foreach ($employees as $employee)
             <option value="{{$employee->id}}" class="text-lg font-medium text-blue-400">{{$employee->first_name}} {{$employee->last_name}}</option>
            @endforeach
          </select>

          <button class="bg-blue-600 text-lg w-1/2 rounded-lg text-white p-3" type="submit">Return Key</button>
        </form>
    </main>


</x-layout>