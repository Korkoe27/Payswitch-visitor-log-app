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
        async function confirmReturn(button) {
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

    // Show loading while sending OTP
    Swal.fire({
        title: 'Sending OTP...',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        // Step 1: Request OTP
        const response = await axios.patch(`/return-key/${keyId}`, {
            returned_by: returned_by,
            _token: "{{ csrf_token() }}"
        });

        Swal.close();

        if (response.data.success) {
            // Step 2: Show OTP input dialog
            const { value: otp, isDismissed } = await Swal.fire({
                title: "Enter OTP",
                input: "text",
                inputLabel: `${employeeName}, please enter the verification code sent to your phone`,
                inputPlaceholder: "Enter your OTP",
                showCancelButton: true,
                confirmButtonText: "Verify",
                cancelButtonText: "Cancel",
                inputValidator: (value) => {
                    if (!value) {
                        return "You need to enter the OTP!";
                    }
                }
            });

            if (isDismissed || !otp) return;

            // Show loading while verifying OTP
            Swal.fire({
                title: 'Verifying...',
                showConfirmButton: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            // Step 3: Verify OTP
            const verifyResponse = await axios.post('/confirmKey', {
                otp: otp,
                _token: "{{ csrf_token() }}"
            });

            Swal.close();

            if (verifyResponse.data.success) {
                // Step 4: Show success message
                await Swal.fire({
                    title: "Success!",
                    text: verifyResponse.data.message,
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    // Redirect to homepage after they dismiss the alert
                    window.location.href = '{{ url("/") }}';
                });

            } else {
                await Swal.fire({
                    title: "Error!",
                    text: verifyResponse.data.message || "Invalid OTP. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        } else {
            await Swal.fire({
                title: "Error!",
                text: response.data.message || "Failed to send OTP.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    } catch (error) {
        console.error(error);
        let errorMessage = "Something went wrong.";
        if (error.response && error.response.data) {
            errorMessage = error.response.data.message || error.response.data.error || "An error occurred.";
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