<x-layout>

    <x-slot:heading>
        
                Users
    </x-slot:heading>



    
    <div class="h-[calc(100vh-5rem)] bg-gray-50">
        <main class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
            {{-- Header Section --}}
            <div class="mb-8 flex justify-end items-center">
                    {{-- <h1 class="text-2xl font-semibold text-gray-900">Users</h1> --}}
                
                @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
                    <a 
                        href="{{ url('create-user') }}"
                        class="inline-flex items-center px-4 py-2 bg-gradient-to-b from-blue-500 to-blue-600 text-white rounded-lg text-lg lg:text-xl hover:from-blue-600 hover:to-blue-700 transition-all duration-200 shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Create New User
                    </a>
                @endif
            </div>
    
            {{-- Table Section --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200" id="users">
                    <thead>
                        <tr class="bg-gray-50">
                            <th scope="col" class="px-6 py-4 text-left text-xl lg:text-2xl font-semibold text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 text-left text-xl lg:text-2xl font-semibold text-gray-900">Role</th>
                            @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
                                <th scope="col" class="px-6 py-4 text-right text-xl lg:text-2xl font-semibold text-gray-900">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-lg lg:text-xl font-medium text-gray-900">
                                    {{ $user?->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-lg lg:text-xl text-gray-600 uppercase">
                                    {{ $user?->role?->name }}
                                </td>
                                @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'delete'))
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                            @if($user?->role?->name !== 'admin')
                                            <div class="flex justify-end space-x-3">
                                                <a
                                                    href="{{ url('update/'.$user->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 text-lg text-blue-600 hover:text-blue-700 hover:bg-blue-50 rounded-md transition-colors duration-150"
                                                >
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                    Change role
                                                </a>
                                                <button
                                                    type="button"
                                                    onclick="confirmDelete({{ $user?->id }}, '{{ $user?->name }}')"
                                                    data-user-id="{{ $user?->id }}"
                                                    data-user-name="{{ $user?->name }}"
                                                    class="inline-flex items-center px-3 py-1.5 text-lg text-red-600 hover:text-red-700 hover:bg-red-50 rounded-md transition-colors duration-150 border border-red-200"
                                                >
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete User
                                                </button>
                                            </div>
                                            @endif
                                        </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    

    <script>




        //change role




        //delete user

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