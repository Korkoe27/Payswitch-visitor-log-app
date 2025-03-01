<x-layout>

    <x-slot:heading>
        Sign Out
    </x-slot:heading>



    

    <div class="w-full  h-1/2 items-center grid place-items-center">
        <section class="flex lg:flex-row   flex-col h-full m-auto w-1/4">
            {{-- <aside class="flex flex-col m-auto py-10 gap-4 h-full w-full bg-cover" style="background-image: url('{{asset('ps-ext 1.png')}}')">
                <h2 class="font-bold text-white text-lg">{{$visitor->first_name}} {{$visitor->last_name}}</h2>
                <h3 class="text-white font-semibold text-base">Thank you for visiting PaySwitch</h3>
            </aside> --}}
            <form action="{{ url('exit/'.$visitor['id'])}}" method="POST" class="flex flex-col gap-y-10 h-full gap-4 m-auto justify-center items-center w-full">

                @csrf
                @method('PATCH')
                <p class="font-semibold text-xl">How was your experience visiting us? <span class="text-red-500">*</span></p>


               <input type="hidden" name="masked_id" value="{{ request()->query('visitor')}}">
                <div class="flex justify-evenly gap-4 w-full">
                    <label for="bad" name="rating" class="flex flex-col">
                        <input type="radio" value="1" name="rating"  id="">
                        <span class="lg:text-2xl">😡</span>
                    </label>
                    <label for="bad" name="rating" class="flex flex-col">
                        <input type="radio" value="2" name="rating" id="">
                        <span class="lg:text-2xl">🙁</span>
                    </label>
                    <label for="bad" name="rating" class="flex flex-col">
                        <input type="radio" value="3" name="rating" id="">
                        <span class="lg:text-2xl">😐</span>
                    </label>
                    <label for="bad" name="rating" class="flex flex-col">
                        <input type="radio" value="4" name="rating" id="">
                        <span class="lg:text-2xl">😊</span>
                    </label>
                    <label for="bad" name="rating" class="flex flex-col">
                        <input type="radio" value="5" name="rating" id="">
                        <span class="lg:text-2xl">😆</span>
                    </label>


                </div>

                <div class="w-full">
                    <label for="visitor_experience" class="block"></label>
                    <textarea name="visitor_experience" class="border h-40 p-4 resize-none w-full" placeholder="Tell Us More" id=""></textarea>
                </div>

                <div class="">
                    <label for="marketing_consent" class="text-sm  lg:text-base">
                        Select this box to receive updates and marketing from Payswitch.
                        <input type="checkbox" value="1" name="marketing_consent" id="">
                    </label>
                </div>


                <button class="bg-blue-400 p-3 text-white rounded-lg" type="submit">Submit</button>
            </form>

        </section>


    </div>


    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const radioButtons = document.querySelectorAll('input[name="rating"]');
            const form = document.querySelector("form");
    
            // Function to apply styles to selected and previous radios
            function updateRadioStyles() {
                let selectedIndex = -1;
    
                // Find the selected radio index
                radioButtons.forEach((radio, index) => {
                    if (radio.checked) {
                        selectedIndex = index;
                    }
                });
    
                // Apply styles accordingly
                radioButtons.forEach((radio, index) => {
                    if (index <= selectedIndex) {
                        radio.parentElement.style.backgroundColor = "#3b82f6"; // Blue background
                        radio.parentElement.style.color = "white";
                        radio.parentElement.style.borderRadius = "10px";
                        radio.parentElement.style.padding = "10px";
                    } else {
                        radio.parentElement.style.backgroundColor = "transparent";
                        radio.parentElement.style.color = "black";
                        radio.parentElement.style.borderRadius = "none";
                        radio.parentElement.style.padding = "0";
                    }
                });
            }
    
            // Add event listeners to each radio button
            radioButtons.forEach(radio => {
                radio.addEventListener("change", updateRadioStyles);
            });
    
            // Ensure only the selected radio is submitted
            // form.addEventListener("submit", function (event) {
            //     event.preventDefault(); // Prevent actual form submission for testing
            //     let selectedRadio = document.querySelector('input[name="rating"]:checked');
    
            //     if (!selectedRadio) {
            //         alert("Please select a rating before submitting.");
            //         return;
            //     }
    
            //     // Create a new FormData object to submit only selected radio
            //     let formData = new FormData();
            //     formData.append("rating", selectedRadio.value);
    
            //     let textArea = document.querySelector('textarea[name="visitor_experience"]');
            //     if (textArea) {
            //         formData.append("visitor_experience", textArea.value);
            //     }
    
            //     let marketingConsent = document.querySelector('input[name="marketing_consent"]');
            //     if (marketingConsent.checked) {
            //         formData.append("marketing_consent", "on");
            //     }
    
            //     // Example: Log form data (replace this with actual form submission logic)
            //     for (let pair of formData.entries()) {
            //         console.log(pair[0] + ": " + pair[1]);
            //     }
    
            //     alert("Form submitted successfully!");
            // });
        });
    </script>
    
    

</x-layout>