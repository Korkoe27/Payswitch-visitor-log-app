<x-layout>

    <x-slot:heading>
        Check Visitor
    </x-slot:heading>

    <main class="p-10">
        <form method="POST"
         {{-- action="{{ url('find-visitor') }}" --}}
         id="find-visitor"
          class="flex-col flex gap-4">
            @csrf
            <div class="">
                <label for="first_name" class=" block text-base lg:text-xl xl:text-2xl font-medium text-black">
                 Phone Number<span class="text-red-400">*</span>
                </label>
                <input type="tel" name="phone_number" required id="phone_number" placeholder="+233 000 000 000" class="w-1/5 bg-transparent rounded-md border border-slate-400 py-5 px-5 text-blue-400 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
             </div>
             <button class="bg-gradient-to-b px-10 text-xl w-fit rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]" type="submit">Submit</button>
        </form>
    </main>
    <script>
        document.getElementById('find-visitor').addEventListener('submit', async function (e) {
            e.preventDefault();
    
            let phone_number = document.getElementById('phone_number').value;
    
            try {
                let response = await axios.post("{{ route('find-visitor') }}", {
                    phone_number: phone_number
                }, {
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    }
                });
    
                let data = response.data;
    
                if (data.success) {
                    const { value: otp } = await Swal.fire({
                        icon: "info",
                        title: "Enter OTP",
                        input: "text",
                        inputLabel: "OTP has been sent to your phone",
                        showCancelButton: true,
                        confirmButtonText: "Verify",
                        preConfirm: async (otp) => {
                            try {
                                let verifyResponse = await axios.post("{{ route('verify-otp') }}", {
                                    otp: otp
                                }, {
                                    headers: {
                                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                                    }
                                });
    
                                let result = verifyResponse.data;
    
                                if (!result.success) {
                                    Swal.showValidationMessage(result.message);
                                }
                                return result;
                            } catch (error) {
                                Swal.showValidationMessage("An error occurred. Please try again.");
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
                            window.location.href = otp.redirect;
                        });
                    }
    
                } else {
                    Swal.fire({
                        icon: "info",
                        title: "Welcome!",
                        text: data.message,
                        timer: 2000, // Auto close after 2 seconds
                        showConfirmButton: false
                    }).then(() => {
                        if (data.redirect) {
                            window.location.href = data.redirect;
                        }
                    });
                }
    
            } catch (error) {
                console.error("Error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "An unexpected error occurred. Please try again.",
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
    </script>
    

</x-layout>