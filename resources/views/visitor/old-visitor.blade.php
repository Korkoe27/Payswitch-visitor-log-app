<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>

    <main class="p-10">
        <form method="POST" action="{{ url('find-visitor') }}" class="">
            @csrf
            <div class="mb-12">
                <label for="first_name" class="mb-[10px] block text-base font-medium text-black">
                 Phone Number<span class="text-red-400">*</span>
                </label>
                <input type="tel" name="phone_number" required id="full_name" placeholder="+233 000 000 000" class="w-1/5 bg-transparent rounded-md border border-slate-400 py-5 px-5 text-blue-400 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
             </div>
             <button class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]" type="submit">Submit</button>
        </form>
    </main>

</x-layout>