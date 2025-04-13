<x-layout>

    <x-slot:heading>
        All Roles   
    </x-slot:heading>



    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'roles', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-key') }}" class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4] flex items-center">Create New Role</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Role</th>
                    <th scope="col" class="px-6 text-lg py-3">Description</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($roles as $role)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base  font-medium text-gray-900 whitespace-nowrap">{{ $role->name }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ $role->description }} </th>
                        @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'roles', 'create'))
                        <td class="px-3 py-4">
                            <button type="button" data-role-id="{{ $role->id }}" data-role-name="{{ $role->name }}"  class="delete-btn font-medium text-lg text-white p-3 rounded-lg bg-red-400">Delete Role</button>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>
    <script>
        
        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function(){
                    const roleId = this.getAttribute("data-role-id");
                    const roleName = this.getAttribute("data-role-name");
                    console.log(roleId, roleName);
                    confirmDelete(roleId, roleName);
                });
            });
        });

        function confirmDelete(roleId, roleName){
            Swal.fire({
                title: "Delete Role?",
                text: `Are you sure you want to delete the "${roleName}" role?`,
                icon: "warning",
                showCancelButton:true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085D6",
                confirmButtonText: "Yes, delete it!"

            }).then((result)=>{

                if(result.isConfirmed){
                deleteRole(roleId, roleName);
                }
            })
        }



async function deleteRole(roleId, roleName) {
    try {
        const response = await axios.delete(`/delete-role/${roleId}`);
        console.log(JSON.stringify(response, null, 2));
        console.log(response.data.success);

        if (response.data.success === true) {
            await Swal.fire({
                title: "Deleted!",
                text: `The "${roleName}" role has been deleted.`,
                icon: "success",
                confirmButtonText: "OK"
            });

            // Redirect only after the user clicks "OK"
            window.location.href = '/roles';
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