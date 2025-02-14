<x-layout>

    <x-slot:heading>
        Return Key
    </x-slot:heading>


    <main class="">
        <aside class="">
            <h2 class="">Return Key</h2>
            <h4 class=""><span class="">{{ $keyEvent->key_name }}</span></h4>

            {{ Log::debug('Keys name' . $keyEvent->key_name) }}
        </aside>
        <form action="" method="post">

            <h4 class="">Who are you?</h4>
            <select class="p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-1/2" name="picked_by" required >
                <option value="" selected disabled class="">Find your name.</option>
            @foreach ($employees as $employee)
             <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
            @endforeach
          </select>

          <button class="" type="submit">Return Key</button>
        </form>
    </main>


</x-layout>