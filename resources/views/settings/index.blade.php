<x-layout>

    <x-slot:heading>
        Settings
    </x-slot:heading>



    <main class="flex flex-wrap justify-evenly gap-4 p-10">


        <div class="flex flex-col items-center w-fit gap-2">
            <label for="" class="">Create a New Visitor Access Card</label>
        <a href="{{ url('create-access-card') }}" class="px-5 py-2 bg-blue-500 text-white rounded-lg">New Card</a>
        </div>

        <div class="flex flex-col items-center w-fit gap-2">
            <label for="" class="">Create a New Department Card</label>
        <a href="{{ url('create-department') }}" class="px-5 py-2 bg-green-500 text-white rounded-lg">New Department</a>
        </div>

        <div class="flex flex-col items-center w-fit gap-2">
            <label for="" class="">Create a New Key</label>
        <a href="{{ url('create-key') }}" class="px-5 py-2 bg-violet-500 text-white rounded-lg">New Key</a>
        </div>

        <div class="flex flex-col items-center w-fit gap-2">
            <label for="" class="">Create a New Staff</label>
        <a href="{{ url('create-staff') }}" class="px-5 py-2 bg-black text-white rounded-lg">New Staff</a>
        </div>
    </main>
</x-layout>