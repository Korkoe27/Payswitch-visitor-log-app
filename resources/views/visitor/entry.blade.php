<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>



{{-- <div> --}}
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->




            <div class="w-full md:w-1/2 my-4 px-10 lg:w-1/3">
                <div class="border-stroke border-blue-300 border-b">
                   <h2 class="text-black mb-2 text-2xl font-semibold ">
                      Welcome to <span class="text-blue-300 font-bold">PaySwitch</span>
                   </h2>
                   <p class="text-black mb-6 text-sm font-medium">
                      Please sign in to continue.
                   </p>
                </div>
             </div>
                    <div class="px-10">
            <form action="{{ url('visit') }}" method="POST" class="flex flex-col pr-6 lg:grid lg:grid-cols-2">

                @csrf


                <aside class="flex flex-col gap-4">
                                  <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="first_name" class="mb-[10px] block text-base font-medium text-black">
                        Full Name <span class="text-red-400">*</span>
                       </label>
                       <input type="text" name="full_name" required id="full_name" placeholder="Jane Doe" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>

                    @error('first_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                 </div>
                {{-- <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="other_name" class="mb-[10px] block text-base font-medium text-black">
                        Other Names
                       </label>
                       <input type="text" name="other_name" id="other_name" placeholder="eg..Jane" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>

                    @error('other_name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                 </div>

                <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="last_name" class="mb-[10px] block text-base font-medium text-black">
                       Last Name <span class="text-red-400">*</span>
                       </label>
                       <input type="text" id="last_name" name="last_name" placeholder="eg.. Doe" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('last_name')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                 </div> --}}


                <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="email" class="mb-[10px] block text-base font-medium text-black">
                       Email
                       </label>
                       <input type="email" placeholder="name@email.com" name="email" id="email" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="phone_number" class="mb-[10px] block text-base font-medium text-black">
                       Phone Number <span class="text-red-400">*</span>
                       </label>
                       <input type="text" id="phone_number" required placeholder="0240000000" name="phone_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>

                    @error('phone_number')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="access_card_number" class="mb-[10px] block text-base font-medium text-black">
                       Access Card Number <span class="text-red-400">*</span>
                       </label>
                       <input type="text" placeholder="Visitor Card ID" required name="access_card_number" id="access_card_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('access_card_number')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="employee" class="mb-[10px] block text-base font-medium text-black">
                       Who are you visiting?
                       </label>
                       <select name="employee" id="employee" class="p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-full"  required >
                        <option value="" selected disabled class="">Visitee</option>
                        @foreach ($employees as $employee)
                         <option value="{{$employee->id}}" class="dark:bg-dark-2">{{$employee->first_name}} {{$employee->last_name}}</option>
                        @endforeach
                       </select>
                    </div>
                    @error('employee')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                </aside>



                <aside class="flex flex-col gap-4">
                   <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="purpose" class="mb-[10px] block text-base font-medium text-black">
                       Purpose of Visit <span class="text-red-400">*</span>
                       </label>
                       <div class="">
                          <select  name="purpose" id="purpose" class='p-4 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-full' required>
                             <option value="" selected disabled class="dark:bg-dark-2">Purpose</option>
                             <option value="official" class="">Official</option>
                             <option value="interview" class="">Interview</option>
                             <option value="personal" class="">Personal</option>
                             <option value="other" class="">Other</option>
                          </select>
                          <span class="absolute right-4 top-1/2 z-10 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                          </span>
                       </div>
                    </div>

                    @error('purpose')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="vehicle_number" class="mb-[10px] block text-base font-medium text-black">
                       Vehicle Number
                       </label>
                       <input type="text" placeholder="GR 1000 25" id="vehicle_number" name="vehicle_number" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('vehicle_number')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="company_name" class="mb-[10px] block text-base font-medium text-black">
                       Company Name
                       </label>
                       <input type="text" placeholder="Company you represent." id="company_name" name="company_name" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('company_name')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2 flex flex-col gap-1">

                  <label for="hasDevice" class="block text-base font-medium text-black">Do you have an electronic Device?</label>
                     <div class="flex items-center gap-4 py-4" >

                        <label for="default-radio-1" class="flex items-center gap-2 text-base font-medium text-gray-900">
                           <input id="device-radio-1" type="radio" value="yes" required name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                           Yes
                        </label>
    

                        <label for="device-radio-2" class="flex items-center gap-2 text-base font-medium text-gray-900">
                           <input id="default-radio-2" type="radio" value="no" name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                           No
                        </label>
                     </div>

                 </div>



                 <div id="deviceInputsSection" class="w-full px-4 md:w-1/2 lg:w-1/2" style="display: none;">
                    <div id="deviceInputsContainer" class="mb-5">

                       <div class="device-block flex gap-2">

                        <div class="flex flex-col gap-2">
                           <label for="deviceName" class="">Device Name</label>
                       <input type="text" placeholder="Hp" id="devices" name="devices[0][name]" class="devices w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

                        </div>
                        <div class="flex flex-col gap-2">
                           <label for="deviceSerialNumber" class="">Serial Number</label>
                       <input type="text" placeholder="8RUIO4283U" id="devices" name="devices[0][serial]" class="devices w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

                        </div>
                        <button type="button" class="remove-device-button text-red-500">Remove</button>

                       </div>

                    </div>
                    <button id="addDeviceButton"  class="text-blue-400"  type="button"><span class="text-xl">+</span> Add another device</button>
                    @error('devices')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>


                 <div class="w-full px-4 md:w-1/2 lg:w-1/2 flex flex-col gap-1">

                  <label for="hasDevice" class="block text-base font-medium text-black">Did you come with companions</label>
                     <div class="flex items-center gap-4 py-4" >

                        <label for="dependents-radio-1" class="flex items-center gap-2 text-base font-medium text-gray-900">
                           <input id="dependents-radio-1" type="radio" value="yes" required name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                           Yes
                        </label>
    

                        <label for="dependents-radio-2" class="flex items-center gap-2 text-base font-medium text-gray-900">
                           <input id="dependents-radio-2" type="radio" value="no" name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                           No
                        </label>
                     </div>

                 </div>

                 <div id="companionsInputsSection" style="display: none;" class="w-full px-4 md:w-1/2 lg:w-1/2">
                  <div id="companionsInputsContainer">


                     <div class="companion-block flex gap-2 mb-5">
                     <div class="flex flex-col gap-2">
                        <label for="deviceName" class="">Full Name</label>
                    <input type="text" placeholder="Hp" id="dependents" name="dependents[0][name]" class="companions w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

                     </div>
                     <div class="flex flex-col gap-2">
                        <label for="deviceSerialNumber" class="">Phone Number</label>
                    <input type="text" placeholder="0250987654" id="dependents" name="dependents[0][phone_number]" class="companions w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-slate-600 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

                     </div>

                     </div>


                    </div>

                    <button id="addPersonButton" class="text-blue-400" type="button"><span class="text-xl">+</span> Add another person</button>
                 </div>
                    @error('dependents')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}                    
                     </div>
                        @enderror  

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label class="mb-[10px] block text-base font-medium text-black" id="comment">
                       Comment
                       </label>
                       <div class="">
                          <textarea type="textarea" name="comment" rows="6" placeholder="Any other information" class="w-full bg-transparent rounded-md lg:h-20 md:h-30 resize-none border border-slate-400 p-3 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"></textarea>
                       </div>
                    </div>
                    @error('comment')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                </aside>
                
                

<div class="w-full px-4 lg:hidden">
    <button type="submit"
        class="bg-blue-400  border rounded-md inline-flex items-center justify-center py-3 px-10 text-center text-base font-medium text-white hover:bg-body-color hover:border-body-color disabled:bg-gray-3 disabled:border-gray-3 disabled:text-dark-5">
        Submit
    </button>
</div>

        </div>
        <div class="w-full hidden px-12 lg:block">
            <button type="submit"
                class="bg-blue-400 dark:bg-dark-2  border rounded-md inline-flex items-center justify-center py-3 px-10 text-center text-base font-medium text-white hover:bg-body-color hover:border-body-color disabled:bg-gray-3 disabled:border-gray-3 disabled:text-dark-5">
                Submit
            </button>
        </div>
            </form>

    {{-- </div> --}}


</x-layout>


<script>
  $(document).ready(function() {

let lastRemovedDeviceBlock = null;
let lastRemovedCompanionBlock = null;

function updateDeviceIndices() {
   $('#deviceInputsContainer .device-block').each(function(index) {
      $(this).find('input').each(function() {
         const name = $(this).attr('name');
         if (name) {
            const updatedName = name.replace(/devices\[\d+\]/, `devices[${index}]`);
            $(this).attr('name', updatedName);
         }
      });
   });
}

function updateCompanionIndices() {
   $('#companionsInputsContainer .companion-block').each(function(index) {
      $(this).find('input').each(function() {
         const name = $(this).attr('name');
         if (name) {
            const updatedName = name.replace(/companions\[\d+\]/, `companions[${index}]`);
            $(this).attr('name', updatedName);
         }
      });
   });
}

$('input[type=radio][name=hasDevice]').change(function() {
   if (this.value == 'yes') {
      $('#deviceInputsSection').show();

      $('#addDeviceButton').off('click').on('click', function() {
         const newDeviceBlock = $('#deviceInputsContainer .device-block').first().clone(); 
         newDeviceBlock.find('input').val(''); 
         $('#deviceInputsContainer').append(newDeviceBlock);
         updateDeviceIndices(); // Update indices after adding a new block
      });
   } else {
      $('#deviceInputsSection').hide();
      $('#deviceInputsContainer .device-block:gt(0)').remove(); // Remove all but the first block
      $('#deviceInputsContainer .device-block input').val('');
      updateDeviceIndices(); // Update indices after resetting blocks
   }
});

$('input[type=radio][name=hasCompany]').change(function() {
   if (this.value == 'yes') {
      $('#companionsInputsSection').show();

      $('#addPersonButton').off('click').on('click', function() {
         const newCompanionBlock = $('#companionsInputsContainer .companion-block').first().clone();
         newCompanionBlock.find('input').val('');
         $('#companionsInputsContainer').append(newCompanionBlock);
         updateCompanionIndices(); // Update indices after adding a new block
      });
   } else {
      $('#companionsInputsSection').hide();
      $('#companionsInputsContainer .companion-block:gt(0)').remove();
      $('#companionsInputsContainer .companion-block input').val(''); 
      updateCompanionIndices(); // Update indices after resetting blocks
   }
});

$('#deviceInputsContainer').on('click', '.remove-device-button', function () {
   const blockToRemove = $(this).closest('.device-block'); 
   lastRemovedDeviceBlock = blockToRemove.clone();
   blockToRemove.remove();
   updateDeviceIndices(); // Update indices after removing a block
});

$('#companionsInputsContainer').on('click', '.remove-companion-button', function () {
   const blockToRemove = $(this).closest('.companion-block'); // Find the closest block to remove
   lastRemovedCompanionBlock = blockToRemove.clone();
   blockToRemove.remove();
   updateCompanionIndices(); // Update indices after removing a block
});
});




</script>