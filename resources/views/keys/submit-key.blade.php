<x-layout>

            {{-- {{ dd($keyEvent) }} --}}
    <x-slot:heading>
        Return Key
    </x-slot:heading>


    <main class="w-1/2 flex flex-col gap-4 p-10">
        <aside class="w-fit">


            @php
            
                $key = App\Models\Key::findOrFail($keyEvent->key_number);

            @endphp
            <h4 class="text-xl font-light">You are returning the <span class="text-red-500 font-bold text-xl">{{$key->key_name}}</span> Key.</h4>
        </aside>
        <form action="{{ url('return-key/'.$keyEvent['id']) }}" class="flex w-1/2  gap-y-4 flex-col" method="POST">


            @csrf
            @method('PATCH')
            <h4 class="">Who are you?</h4>
            <select class="p-4 focus:border-blue-300 rounded-md outline-none text-blue-800 border border-gray-400 w-full" id="returned_by" name="returned_by" required >
                <option value="" selected disabled class="">Find your name.</option>
            @foreach ($employees as $employee)
             <option value="{{$employee?->id}}" class="text-lg font-medium text-blue-400">{{$employee?->first_name}} {{$employee?->last_name}}</option>
            @endforeach
          </select>

          <button class="bg-blue-600 text-lg w-1/2 rounded-lg text-white p-3" type="button" onclick="confirmReturn(this)" data-key-id="{{ $keyEvent?->id }}" data-key-name="{{ $key->key_name }}">Return Key</button>
        </form>
    </main>

    <script>
        async function confirmReturn(button){
            const keyId = button.getAttribute("data-key-id");
            const keyName = button.getAttribute("data-key-name");
            const returned_by = document.getElementById("returned_by").value;
            const selectedEmployee = document.querySelector(`#returned_by option[value="${returned_by}"]`);
        
            if (!returned_by || !selectedEmployee) {
                await Swal.fire({
                    title: "Error!",
                    text: "Please select your name before returning the key.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }
        
            const employeeName = selectedEmployee.textContent.trim();
        
            const confirmResult = await Swal.fire({
                title: "Confirm Return",
                text: `${employeeName}, are you sure you want to return the "${keyName}" key?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28A745",
                cancelButtonColor: "#D33",
                confirmButtonText: "Yes, return it!",
                cancelButtonText: "Cancel"
            });
        
            if (!confirmResult.isConfirmed) return;
        
            try {
                const response = await axios.patch(`/return-key/${keyId}`, {
                    returned_by: returned_by,
                    _token: "{{ csrf_token() }}"
                });
        
                if (response.data.success) {
                    await Swal.fire({
                        title: "Success!",
                        text: `${employeeName}, you have submitted the "${keyName}" key. Thank You!`,
                        icon: "success",
                        confirmButtonText: "OK"
                    });
        
                    window.location.href = "/";
                }
            } catch (error) {
                console.log(error);
                let errorMessage = "Something went wrong.";
                if (error.response && error.response.data && error.response.data.error) {
                    errorMessage = error.response.data.error;
                }
        
                await Swal.fire({
                    title: "Error!",
                    text: errorMessage,
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }
        </script>
        
        


</x-layout>