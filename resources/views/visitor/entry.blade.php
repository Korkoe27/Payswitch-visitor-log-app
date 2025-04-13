<x-layout>

   <x-slot:heading>
       Sign In
   </x-slot:heading>



<div class="lg:h-full h-fit lg:px-10 px-16 py-5  overflow-y-auto lg:w-full">
   <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->


           <div class="w-full py-5  lg:w-1/3">
               {{-- <div class=""> --}}
                  <h2 class="text-black text-3xl font-semibold ">
                     Welcome to <span class="text-blue-600 font-bold">PaySwitch</span>
                  </h2>
                  <p class="text-black lg:text-lg font-medium">
                     Please sign in to continue.
                  </p>
               {{-- </div> --}}
            </div>
                   {{-- <div class=""> --}}
           <form action="{{ url('visit') }}" method="POST" class="flex  w-full gap-10 py-10 overflow-auto">

               @csrf


               <div class="flex bg-white flex-col w-full h-full gap-10">
                                 <div class="w-full  lg:w-1/2">
                   <div class="">
                      <label for="first_name" class=" block text-lg lg:text-xl font-medium text-black">
                       Full Name <span class="text-red-400">*</span>
                      </label>
                      <input type="text" name="full_name" required id="full_name" placeholder="Jane Doe" class="rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />
                   </div>

                   @error('first_name')
                       <div class="text-red-500">{{ $message }}</div>
                   @enderror
                </div>

               <div class="w-full lg:w-1/2">
                   <div class="">
                      <label for="email" class=" block lg:text-xl text-lg font-medium text-black">
                      Email <span class="text-gray-400 lg:text-lg">(optional)</span>
                      </label>
                      <input type="email" placeholder="name@email.com" name="email" id="email" class="rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />
                   </div>
                   @error('email')
                   <div class="text-red-500">{{ $message }}</div>
                   @enderror
                </div>

                <div class="w-full   lg:w-1/2">
                   <div class="">
                      <label for="phone_number" class="flex items-center lg:text-xl text-lg font-medium text-black">
                      Phone Number <span class="text-red-400">*</span>
                      </label>
                      <input type="text" id="phone_number" value="{{ $phone_number ?? old('phone_number') }}" required placeholder="024 000 0000" name="phone_number" class="rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />
                   </div>

                   @error('phone_number')
                   <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                   @enderror
                </div>


                <div class="w-full   lg:w-1/2">
                   <div class="">
                     <label for="employee" class=" flex items-center lg:text-xl text-lg font-medium text-black">
                        Who are you visiting?<span class="text-red-400"> *</span>
                        </label>
                        <select name="employee" id="employee" class="rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border"  required >
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

                <div class="w-full">
                  <button type="submit"
                      class="bg-gradient-to-b px-14 lg:text-xl text-lg rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]">
                      Submit
                  </button>
               </div>
               
                      </div>
                     {{-- </div> --}}



               <div class="flex h-full w-full flex-col gap-10">
                  <div class="w-full   lg:w-1/2">
                   <div class="">
                      <label for="purpose" class="flex items-center lg:text-xl text-lg font-medium text-black">
                      Purpose of Visit <span class="text-red-400">*</span>
                      </label>
                      <div class="">
                         <select  name="purpose" id="purpose" class='rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border' required>
                            <option value="" selected disabled class="dark:bg-dark-2">Purpose</option>
                            <option value="official" class="text-red-500 text-lg">Official</option>
                            <option value="interview" class="text-blue-600 text-lg">Interview</option>
                            <option value="personal" class="text-green-600 text-lg">Personal</option>
                            <option value="other" class="text-yellow-600 text-lg">Other</option>
                         </select>
                      </div>
                   </div>

                   @error('purpose')
                   <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                   @enderror
                </div>

                <div class="w-full   lg:w-1/2">
                   <div class="">
                      <label for="company_name" class=" flex items-center lg:text-xl text-lg font-medium text-black">
                      Company Name <span class="text-gray-400">(optional)</span>
                      </label>
                      <input type="text" placeholder="Company you represent." id="company_name" name="company_name" class="rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />
                   </div>
                   @error('company_name')
                   <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                   @enderror
                </div>

                <div class="w-full   lg:w-1/2 flex flex-col gap-1">

                 <label for="hasDevice" class="flex items-center lg:text-xl text-lg font-medium text-black">Do you have an electronic Device? <span class="text-red-400">*</span></label>
                    <div class="flex items-center gap-4 py-4" >

                       <label for="default-radio-1" class="flex items-center gap-2 lg:text-xl text-lg font-medium text-gray-900">
                          <input id="device-radio-1" type="radio" value="yes" required name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white  checked:border-blue-400 checked:bg-blue-400  focus:ring-blue-500 w-5 h-5 forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                          Yes
                       </label>
   

                       <label for="device-radio-2" class="flex items-center gap-2 lg:text-xl text-lg font-medium text-gray-900">
                          <input id="default-radio-2" type="radio" value="no" name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white  before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 h-5 w-5 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400  [&:not(:checked)]:before:hidden">
                          No
                       </label>
                    </div>

                </div>



                <div id="deviceInputsSection" class="w-full   lg:w-1/2" style="display: none;">
                   <div id="deviceInputsContainer" class="">

                      <div class="device-block flex gap-2">

                       <div class="flex flex-col gap-2">
                          <label for="deviceName" class="">Device Name</label>
                      <input type="text" placeholder="Hp" id="devices" name="devices[0][name]" class="devices rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />

                       </div>
                       <div class="flex flex-col gap-2">
                          <label for="deviceSerialNumber" class="">Serial Number</label>
                      <input type="text" placeholder="8RUIO4283U" id="devices" name="devices[0][serial]" class="devices rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />

                       </div>
                       <button type="button" class="remove-device-button text-red-500">Remove</button>

                      </div>

                   </div>
                   <button id="addDeviceButton"  class="text-blue-400"  type="button"><span class="text-xl">+</span> Add another device</button>
                   @error('devices')
                   <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                   @enderror
                </div>


                <div class="w-full   lg:w-1/2 flex flex-col gap-1">

                 <label for="companions" class="flex items-center lg:text-xl text-lg font-medium text-black">Did you come with companions <span class="text-red-400">*</span></label>
                    <div class="flex items-center gap-4 py-4" >

                       <label for="companions-radio-1" class="flex items-center gap-2 lg:text-xl text-lg font-medium text-gray-900">
                          <input id="companions-radio-1" type="radio" value="yes" required name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white w-5 h-5 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400  focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                          Yes
                       </label>
   

                       <label for="companions-radio-2" class="flex items-center gap-2 lg:text-xl text-lg font-medium text-gray-900">
                          <input id="companions-radio-2" type="radio" value="no" name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white checked:border-blue-400 checked:bg-blue-400 w-5 h-5 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                          No
                       </label>
                    </div>

                </div>

                <div id="companionsInputsSection" style="display: none;" class="w-full   lg:w-1/2">
                 <div id="companionsInputsContainer">


                    <div class="companion-block flex gap-2">
                    <div class="flex flex-col gap-2">
                       <label for="companions" class="">Full Name</label>
                   <input type="text" placeholder="Kweku Amos" id="companions" name="companions[0][name]" class="companions rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />

                    </div>
                    <div class="flex flex-col gap-2">
                       <label for="deviceSerialNumber" class="">Phone Number</label>
                   <input type="tel" placeholder="0250987654" id="companions" name="companions[0][phone_number]" class="companions rounded-md p-4 bg-transparent focus:border-blue-500 outline-none w-full border" />

                    </div>

                    <button type="button" class="remove-companion-button text-red-500">Remove</button>
                    </div>


                   </div>

                   <button id="addPersonButton" class="text-blue-400" type="button"><span class="text-xl">+</span> Add another person</button>
                </div>
                   @error('companions')
                   <div class="text-red-500 italic font-normal text-sm">{{ $message }}                    
                    </div>
                       @enderror  

               </div>
               
               

           </form>

   </div>


</x-layout>


<script>

  
 $(document).ready(function() {

let lastRemovedDeviceBlock = null;
let lastRemovedCompanionBlock = null;

function updateDeviceIndices() {
  $('#deviceInputsContainer .device-block').each(function(index) {
     // console.log( $(this).find('input'));
     $(this).find('input').each(function() {
        const name = $(this).attr('name');
        
        console.log(name);
        if (name) {
           const updatedName = name.replace(/devices\[\d+\]/, `devices[${index}]`);
           $(this).attr('name', updatedName);
        }
     });
  });
}

function updateCompanionIndices() {

// console.log($('#companionsInputsContainer .companion-block'));
  $('#companionsInputsContainer .companion-block').each(function(index) {

        // console.log( $(this).find('input'));
     $(this).find('input').each(function() {
        const name = $(this).attr('name');
        console.log(name);

        if (name) {
           // const newVar = "companions[0][name]";
           // const updatedVar = newVar.replace(/companions\[\d+\]/, `companions[${index}]`);

           // console.log("Arr" , updatedVar);

           console.log('name before: ', name)

           const companionName = name.replace(/companions\[\d+\]/, `companions[${index}]`);

           console.log('uodated name: ', companionName);
           $(this).attr('name', companionName);


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