<x-layout>

    <x-slot:heading>
        Create a New Key    
    </x-slot:heading>

    <main class="">
        <form action="{{url('store-key')}}" method="post" class="flex flex-col mx-auto justify-center items-center gap-4">

            @csrf
    <div class="flex flex-col">
        <label for="key_number" class="">Key ID</label>
        <input type="text" name="key_number" id="key_number" class="border border-gray-300 p-2 rounded-lg" placeholder="PS-KY-001">
    </div>
    <div class="flex flex-col">
        <label for="key_name" class="">Key name</label>
        <input type="text" name="key_name" id="key_name" class="border border-gray-300 p-2 rounded-lg" placeholder="Sales Office">
    </div>
    <div class="">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Create</button>
    </div>
        </form>

    </main>

</x-layout>