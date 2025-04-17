<x-layout>

    <x-slot:heading>
        All Keys   
    </x-slot:heading>



    <main class="lg:h-[calc(100vh-5rem)] h-[calc(100vh-6.5rem)] bg-gray-50 py-8">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
            {{-- Header Section --}}
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Key Management</h1>
                        <p class="mt-1 text-xl text-gray-500">Manage and track all keys in the system</p>
                    </div>
                    @if(\App\Models\Roles::hasPermission(auth()->user()->role_id, 'keys', 'create'))
                        <a 
                            href="{{ url('create-key') }}"
                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xl font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 shadow-sm"
                        >
                            <span>Create New Key</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Table Section --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-6 py-4 text-left text-lg font-medium text-gray-500 uppercase tracking-wider">
                                    Key Number
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-lg font-medium text-gray-500 uppercase tracking-wider">
                                    Key Name
                                </th>
                                <th scope="col" class="px-6 py-4 text-right text-lg font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($keys as $key)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8">
                                                <div class="h-8 w-8 rounded-lg bg-blue-100 flex items-center justify-center">
                                                    <span class="text-xl font-medium text-blue-700">
                                                        #{{ substr($key->key_number, -2) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-xl font-medium text-gray-900">{{ $key->key_number }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-xl text-gray-900">{{ $key->key_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-xl font-medium">
                                        <button
                                            type="button"
                                            onclick="confirmDelete({{ $key->id }}, '{{ $key->key_name }}')"
                                            class="inline-flex items-center px-3 py-2 border border-red-200 text-xl font-medium rounded-lg text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200"
                                        >
                                            Delete Key
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Empty State --}}
            @if($keys->isEmpty())
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    <h3 class="mt-2 text-xl font-medium text-gray-900">No keys found</h3>
                    <p class="mt-1 text-xl text-gray-500">Get started by creating a new key.</p>
                </div>
            @endif
        </div>
    </main>

    <script>

$(document).ready( function () {
    $('#keys').DataTable();
} );

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