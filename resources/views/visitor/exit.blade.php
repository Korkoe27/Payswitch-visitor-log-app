<x-layout>

    <x-slot:heading>
        Sign Out
    </x-slot:heading>



    
    @if(session('departed'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Thank You!',
            text: 'Thank you for visiting us today. We hope to see you again soon!',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Have a great day!'
        }).then(() => {
            // Redirect to homepage after they dismiss the alert
            window.location.href = '{{ url("/") }}';
        });
    });
</script>
@endif

     <form action="{{ url('exit/'.$visitor['id'])}}" method="POST" class="flex flex-col gap-y-10 h-full gap-4 m-auto justify-center items-center w-full">
        @csrf
        @method('PATCH')
        
        <p class="font-semibold text-xl">How was your experience visiting us?</p>

        <input type="hidden" name="masked_id" value="{{ request()->query('visitor')}}">
        
        <div class="rating-container flex items-center">
            <input type="radio" name="rating" value="1" id="star1" class="hidden" />
            <label for="star1" class="star-label cursor-pointer">
                <svg class="w-10 h-10 text-gray-300 transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </label>

            <input type="radio" name="rating" value="2" id="star2" class="hidden" />
            <label for="star2" class="star-label cursor-pointer">
                <svg class="w-10 h-10 text-gray-300 transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </label>

            <input type="radio" name="rating" value="3" id="star3" class="hidden" />
            <label for="star3" class="star-label cursor-pointer">
                <svg class="w-10 h-10 text-gray-300 transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </label>

            <input type="radio" name="rating" value="4" id="star4" class="hidden" />
            <label for="star4" class="star-label cursor-pointer">
                <svg class="w-10 h-10 text-gray-300 transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </label>

            <input type="radio" name="rating" value="5" id="star5" class="hidden" />
            <label for="star5" class="star-label cursor-pointer">
                <svg class="w-10 h-10 text-gray-300 transition-colors duration-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </label>
        </div>

        <div class="w-1/2">
            <label for="visitor_experience" class="block"></label>
            <textarea name="visitor_experience" class="border h-40 p-4 resize-none w-full" placeholder="Tell Us More" id="visitor-experience"></textarea>
        </div>

        <div class="">
            <label for="marketing_consent" class="text-sm lg:text-base">
                <input type="checkbox" value="1" name="marketing_consent" id="marketing-consent">
                Select this box to receive updates and marketing from Payswitch.
            </label>
        </div>

        <button class="bg-blue-400 p-3 text-white rounded-lg" type="submit">Submit</button>
    </form>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const ratingContainer = document.querySelector('.rating-container');
        const starLabels = document.querySelectorAll('.star-label');
        const form = document.querySelector('form');

        function updateStarRating(selectedStar) {
            // Reset all stars to gray
            starLabels.forEach(label => {
                const svg = label.querySelector('svg');
                svg.classList.remove('text-yellow-300');
                svg.classList.add('text-gray-300');
            });

            // Color stars up to and including the selected star
            for (let i = 0; i < selectedStar; i++) {
                const svg = starLabels[i].querySelector('svg');
                svg.classList.remove('text-gray-300');
                svg.classList.add('text-yellow-300');
            }
        }

        // Add event listeners to star labels
        starLabels.forEach((label, index) => {
            label.addEventListener('click', () => {
                // Select the corresponding radio button
                const radio = document.getElementById(`star${index + 1}`);
                radio.checked = true;
                
                // Update star colors
                updateStarRating(index + 1);
            });

            // Hover effect
            label.addEventListener('mouseenter', () => {
                updateStarRating(index + 1);
            });

            label.addEventListener('mouseleave', () => {
                // Revert to the selected rating or reset
                const selectedRadio = document.querySelector('input[name="rating"]:checked');
                if (selectedRadio) {
                    const selectedIndex = parseInt(selectedRadio.value) - 1;
                    updateStarRating(selectedIndex + 1);
                } else {
                    updateStarRating(0);
                }
            });
        });

        // Form validation
        form.addEventListener('submit', function(event) {
            const selectedRating = document.querySelector('input[name="rating"]:checked');
            
            if (!selectedRating) {
                event.preventDefault();
                alert('Please select a rating before submitting.');
                return;
            }

            // Optional: Add more validation for textarea or other fields if needed
        });
    });
    </script>

</x-layout>