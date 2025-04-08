<x-layout>

    <x-slot:heading>
        Check Visitor
    </x-slot:heading>

    <main class="p-10 flex w-full flex-col lg:py-96 py-48 justify-center m-auto items-center">
        <form method="POST"
         {{-- action="{{ url('find-visitor') }}" --}}
         id="find-visitor"
          class="flex-col flex gap-10 justify-center items-center w-full">
            @csrf
            <div class="flex-col flex gap-2">
                <label for="first_name" class=" block text-base lg:text-xl  font-medium text-black">
                 Phone Number<span class="text-red-400">*</span>
                </label>
                <input type="tel" name="phone_number"  pattern="[0-9]{10}" 
                minlength="10" 
                maxlength="10"  required id="phone_number" placeholder="024 000 0000" class="w-full bg-transparent rounded-md text-2xl border border-slate-400 py-5 px-5 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
             </div>
             <button class="bg-gradient-to-b px-10  text-2xl w-fit rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]" type="submit">Submit</button>
        </form>
    </main>



    <script>
    

    document.getElementById('find-visitor').addEventListener('submit', async function (e) {
    e.preventDefault();

    // Show initial loading spinner
    Swal.fire({
        title: 'Processing...',
        // html: '<div class="flex justify-center"><div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-500"></div></div>',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    let phoneNumber = document.getElementById('phone_number');
    let phone_number = phoneNumber.value
        .replace(/\s+/g, '')  // Remove all whitespace
        .replace(/^0/, '233') // Replace leading 0 with country code 233
        .replace(/[^\d]/g, '') // Remove any non-digit characters
        .slice(0, 12);  // Limit to max 12 characters
    
    console.log(phone_number);
    try {
        let response = await axios.post("{{ route('find-visitor') }}", {
            phone_number: phone_number
        }, {
            headers: {
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
            }
        });

        let data = response.data;
        // Close the loading spinner
        Swal.close();

        if (data.success) {
            const { value: otp } = await Swal.fire({
                icon: "info",
                title: "Enter OTP",
                input: "text",
                inputLabel: "A code has been sent to your phone",
                text: data.message, // Display the message from the server
                showCancelButton: true,
                confirmButtonText: "Verify",
                preConfirm: async (otp) => {
                    // Show loading spinner during OTP verification
                    Swal.showLoading();
                    try {
                        console.log("trying OTP");
                        let verifyResponse = await axios.post("{{ route('verify-otp') }}", {
                            otp: otp
                        }, {
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                            }
                        });

                        let result = verifyResponse.data;

                        if (!result.success) {
                            Swal.hideLoading();
                            Swal.showValidationMessage(result.message);
                        }
                        return result;
                    } catch (error) {
                        Swal.hideLoading();
                        Swal.showValidationMessage(
                            error.response?.data?.message || 
                            "An error occurred. Please try again."
                        );
                    }
                }
            });

            if (otp && otp.success) {
                Swal.fire({
                    icon: "success",
                    title: "OTP Verified",
                    text: otp.message,
                    timer: 2000, // Auto close after 2 seconds
                    showConfirmButton: false
                }).then(() => {
                    // Show spinner during redirect
                    Swal.fire({
                        title: 'Redirecting...',
                        // html: '<div class="flex justify-center"><div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-500"></div></div>',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                            window.location.href = otp.redirect;
                        }
                    });
                });
            }

        } else if (data.redirect) {
            // Handle first-time visitor scenario
            Swal.fire({
                icon: "info",
                title: "Welcome!",
                text: data.message,
                timer: 2000, // Auto close after 2 seconds
                showConfirmButton: false
            }).then(() => {
                // Show spinner during redirect
                Swal.fire({
                    title: 'Redirecting...',
                    // html: '<div class="flex justify-center"><div class="animate-spin rounded-full h-10 w-10 border-b-2 border-blue-500"></div></div>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                        window.location.href = data.redirect;
                    }
                });
            });
        } else {
            // Handle other error scenarios
            Swal.fire({
                icon: "error",
                title: "Error",
                text: data.message || "An unexpected error occurred.",
                timer: 2000,
                showConfirmButton: false
            });
        }

    } catch (error) {
        // Close loading spinner on error
        Swal.close();
        console.error("Error:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: error.response?.data?.message || "An unexpected error occurred. Please try again.",
            timer: 2000,
            showConfirmButton: false
        });
    }
});
    </script>
    

</x-layout>