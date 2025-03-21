<x-layout>

    <x-slot:heading>
       New Role
    </x-slot:heading>


    <main class="p-10 flex-col flex gap-4">
        <h4 class="text-lg lg:text-3xl font-semibold">Add Role</h4>

        <hr>

        <form action="{{ url('create-role') }}" method="POST" class="flex-col flex gap-4">
            @csrf
            <div class="flex-col flex gap-4">
                <label for="name" class="text-lg lg:text-2xl">Name</label>
                <input type="text" class="p-4 border border-gray-200 rounded-lg" required name="name">
            </div>
            <div class="flex-col flex gap-4">
                <label for="description" class="text-lg lg:text-2xl">
                    Description
                </label>
                <textarea name="description" id="description" rows="4" class="border w-full rounded-md bg-white px-3.5 py-2 text-base "></textarea>
            </div>

            <h4 class="text-lg lg:text-3xl py-4">Permissions</h4>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Visits
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Visits
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Visits
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Visits
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Logs
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Logs
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Logs
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Logs
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Roles
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Staff
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Staff
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Staff
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Staff
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Keys
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Keys
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Keys
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Keys
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Settings
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Settings
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Settings
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Settings
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Reports
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Reports
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Reports
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Reports
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Departments
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Departments
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Departments
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Departments
                </label>
            </div>

            <div class="flex justify-between gap-4">
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    View Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Create Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Modify Roles
                </label>
                <label for="" class="">
                    <input type="checkbox" name="" class="" id="">
                    Delete Roles
                </label>
            </div>


            <button class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4] flex items-center" type="submit">Add Role</button>

        </form>
    </main>
</x-layout>