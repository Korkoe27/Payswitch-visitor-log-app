<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>



{{-- <div> --}}
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->



        <div class="">
            <h2 class="">Welcome to <span>Payswitch</span></h2>
            
            <form action="{{ url('visit') }}" method="POST">

                @csrf

                <div class="">
                    <label for="first_name" class="">First Name <span>*</span></label>
                    <input type="text" id="first_name" name="first_name" class="">
                </div>

                <div class="">
                    <label for="last_name" class="">Last Name <span>*</span></label>
                    <input type="text" id="last_name" name="last_name" class="">
                </div>

                <div class="">
                    <label for="last_name" class="">Email</label>
                    <input type="text" id="last_name" name="last_name" class="">
                </div>

                <div class="">
                    <label for="phone_number" class="">Phone Number <span>*</span></label>
                    <input type="text" id="phone_number" name="phone_number" class="">
                </div>

                <div class="">
                    <label for="access_card_number" class="">Access Card Number <span>*</span></label>
                    <input type="text" id="access_card_number" name="access_card_number" class="">
                </div>



                <div class="">
                    <label for="visitee" class="">Who are you visiting?</label>
                    <input type="text" id="visitee" name="visitee" class="">
                </div>

                <div class="">
                    <label for="vehicle_number" class="">Vehicle Number</label>
                    <input type="text" id="vehicle_number" name="vehicle_number" class="">
                </div>
                <div class="">
                    <label for="purpose" class="">Purpose of visit</label>
                    <select name="purpose" id="purpose" class="">
                        <option value="" selected disabled class="">Purpose</option>
                        <option value="official">Official</option>
                        <option value="interview">Interview</option>
                        <option value="personal">Personal</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="">
                    <label for="device" class="">Vehicle Number</label>
                    <input type="text" id="device" name="device" class="">
                </div>

                <div class="">
                    <label for="devices" class="">Serial Number of Device</label>
                    <input type="text" id="devices" name="devices" class="">
                </div>


                <div class="">
                    <label for="dependents" class="">Companions name</label>
                    <input type="text" id="dependents" name="dependents" class="">
                </div>
                <div class="">
                    <label for="comment" class="">Comments</label>
                    <textarea name="comment" id="comment" cols="30" rows="10" class=""></textarea>
                </div>

                
                



                <div class="">
                    <button type="submit" class="border">Submit</button>
                </div>
            </form>
        </div>
    {{-- </div> --}}


</x-layout>