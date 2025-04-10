<x-layout>

    <x-slot:heading>
        All Users
    </x-slot:heading>



    
    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-user') }}" class="bg-gradient-to-b lg:px-10 px-3 lg:text-xl text-lg rounded-lg lg:py-2 py-1 text-white from-[#247EFC] to-[#0C66E4]">Create New User</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500" id="users">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg lg:text-xl py-3">Name</th>
                    <th scope="col" class="px-6 text-lg lg:text-xl py-3">Role</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
                    <th class="px-6 py-6" scope="col"></th>
                    @endif
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base lg:text-xl font-medium text-gray-900 whitespace-nowrap">{{ $user?->name }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 lg:text-lg uppercase whitespace-nowrap">{{ $user?->role?->name }} </th>
                        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'delete'))
                        <td class="px-3 py-4">
                            @if ($user?->role?->name !== 'admin')
                                
                            <button type="button"  data-user-id="{{ $user?->id }}" data-user-name="{{ $user?->name }}" onclick="confirmDelete({{ $user?->id }})"
                                class="font-medium text-red-500 px-3 py-1 text-lg rounded-lg border border-red-400"
                                >Delete User</button>
                                @endif
                            </td>
                            @endif
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>



    <script>
        $(document).ready(function() {
            $('#users').DataTable();
        });

        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function(){
                    const userId = this.getAttribute("data-user-id");
                    const userName = this.getAttribute("data-user-name");
                    console.log(userId, userName);
                    confirmDelete(userId, userName);
                });
            });
        });

        function confirmDelete(userId, userName){
            Swal.fire({
                title: "Delete User?",
                text: `Are you sure you want to revoke ${userName}'s access?`,
                icon: "warning",
                showCancelButton:true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085D6",
                confirmButtonText: "Yes, delete this user!"

            }).then((result)=>{

                if(result.isConfirmed){

                    console.log("Confirmed");
                deleteUser(userId, userName);
                }
            })
        }
        
async function deleteUser(userId, userName) {
    try {
        const response = await axios.delete(`/revoke-access/${userId}`);
        console.log(JSON.stringify(response, null, 2));
        // console.log(response.data.success);

        if (response.data.success === true) {

            console.log("Delete modal.")
            await Swal.fire({
                title: "Deleted!",
                text: `The user, ${userName} has been deleted.`,
                icon: "success",
                confirmButtonText: "OK"
            });

            // Redirect only after the user clicks "OK"
            window.location.href = '/users';
        }
    } catch (error) {
        console.log(error);
        let errorMessage = "Something went wrong.";
        if (error.response && error.response.data && error.response.data.error) {
            errorMessage = error.response.data.error;
        }
        await Swal.fire("Error!", errorMessage, "error");
    }
}




    </script>
</x-layout>