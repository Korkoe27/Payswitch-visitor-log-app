<x-layout>

    <x-slot:heading>
        All Keys   
    </x-slot:heading>



    <main class="p-5">
        @if(\App\Models\Roles::hasPermission(auth()->id(), 'keys', 'create'))
        <div class="flex justify-end p-5 items-center">
            <a href="{{ url('create-key') }}" class="px-3 text-white py-2 rounded-md bg-green-500">Create New Key</a>
        </div>

        @endif
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 text-lg py-3">Key Number</th>
                    <th scope="col" class="px-6 text-lg py-3">Key Name</th>
                    {{-- <th scope="col" class="px-6 py-3">Time In</th> --}}
                    <th class="px-6 py-6" scope="col"></th>
                </tr>
            </thead>

            <tbody class="text-base">
                @foreach ($keys as $key)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 text-base  font-medium text-gray-900 whitespace-nowrap">{{ $key->key_number }}</th>
                        <th scope="row" class="px-6 py-4 text-base font-medium text-gray-900 whitespace-nowrap">{{ $key->key_name }} </th>
                        <td class="px-3 py-4">
                            <button type="button" data-key-id="{{ $key->id }}" data-key-name="{{ $key->key_name }}" onclick="confirmDelete({{ $key->id}})" class=" delete-btn font-medium text-lg text-white p-3 rounded-lg bg-red-400">Delete Key</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        
        
        </table>


    </main>

    <script>

        document.addEventListener("DOMContentLoaded", function(){
            document.querySelectorAll(".delete-btn").forEach(button => {
                button.addEventListener("click", function(){
                    const keyId = this.getAttribute("data-key-id");
                    const keyName = this.getAttribute("data-key-name");
                    console.log(keyId, keyName);
                    confirmDelete(keyId, keyName);
                });
            });
        });

        function confirmDelete(keyId, keyName){
            Swal.fire({
                title: "Delete Key?",
                text: `Are you sure you want to delete the "${keyName}" key?`,
                icon: "warning",
                showCancelButton:true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085D6",
                confirmButtonText: "Yes, delete it!"

            }).then((result)=>{

                if(result.isConfirmed){
                deleteKey(keyId, keyName);
                }
            })
        }



async function deleteKey(keyId, keyName) {
    try {
        const response = await axios.delete(`/all_keys/${keyId}`);
        // console.log(JSON.stringify(response, null, 2));
        // console.log(response.data.success);

        if (response.data.success === true) {
            await Swal.fire({
                title: "Deleted!",
                text: `The "${keyName}" key has been deleted.`,
                icon: "success",
                confirmButtonText: "OK"
            });

            // Redirect only after the user clicks "OK"
            window.location.href = '/all_keys';
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