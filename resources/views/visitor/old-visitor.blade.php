<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>

    <main class="">
        <form method="POST" action="{{ url('find-visitor') }}" class="">
            @csrf
            <div class="mb-12">
                <label for="first_name" class="mb-[10px] block text-base font-medium text-black">
                 Phone Number<span class="text-red-400">*</span>
                </label>
                <input type="text" name="phone_number" required id="full_name" placeholder="+233492839" class="w-1/5 bg-transparent rounded-md border border-slate-400 py-5 px-5 text-blue-400 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
             </div>
             <button class="bg-black rounded px-5 text-white py-2" type="submit">Submit</button>
        </form>
    </main>

</x-layout>