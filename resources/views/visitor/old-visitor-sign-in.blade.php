<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>

    <main class="p-10  lg:w-1/2">
        <form action="{{ url('visit') }}" class="flex-col flex gap-10" method="post">

            @csrf

      

      <div class="hidden">
            <input type="hidden" name="full_name"value="{{ $visitor->full_name}}">
            <input type="hidden" name="company_name" value="{{ $visitor->company_name }}">
            <input type="hidden" name="email" value="{{ $visitor->email }}">
            <input type="hidden" name="phone_number" value="{{ $visitor->phone_number }}">
      </div>

      
      <div class="bg-[#F2F8FF] rounded-xl p-5 justify-between flex">
         {{-- <div class="flex"> --}}
            <div class="w-3/4 flex-col gap-5 justify-between flex lg:p-5">
                <h4 class="lg:text-4xl font-bold text-blue-800">{{ $visitor->full_name}}</h4>


               <span class="">
                  <span class="lg:text-xl">Company</span>
                <h4 class="lg:text-2xl text-blue-800">{{ $visitor->company_name }}</h4> 
               </span>

               <span class="">
                  <span class="lg:text-xl">Email</span>
                <h4 class="lg:text-2xl text-blue-800">{{ $visitor->email }}</h4>

               </span> 
            <span class="">
               <span class=" font-medium text-gray-600 lg:text-lg">
                  Phone Number
               </span>
                <h4 class="lg:text-2xl text-blue-800">{{ $visitor->phone_number }}</h4>

            </span>
            </div>
            {{-- <div class="w-1/4 flex-col flex gap-4"> --}}

            <img src="{{ asset('profile.svg') }}" alt="" class="w-1/4">


            {{-- </div> --}}
        {{-- </div> --}}
        </div>



    <div class="w-full">
        <div class="">
           <label for="employee" class=" block lg:text-xl font-medium text-black">
           Who are you visiting?
           </label>
           <select name="employee" id="employee" class="p-5 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-full"  required >
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
        <div class="">
           <label for="purpose" class=" block lg:text-xl font-medium text-black">
           Purpose of Visit <span class="text-red-400">*</span>
           </label>
           <div class="">
              <select  name="purpose" id="purpose" class='p-5 focus:border-blue-300 rounded-md outline-none text-slate-500 border border-gray-400 w-full' required>
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


     <div class="w-full flex flex-col gap-1">

        <label for="hasDevice" class="block lg:text-xl font-medium text-black">Do you have an electronic Device?</label>
           <div class="flex items-center gap-4 py-4" >

              <label for="default-radio-1" class="flex items-center gap-2 text-xl font-medium text-gray-900">
                 <input id="device-radio-1" type="radio" value="yes" required name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                 Yes
              </label>


              <label for="device-radio-2" class="flex items-center gap-2 text-xl font-medium text-gray-900">
                 <input id="default-radio-2" type="radio" value="no" name="hasDevice" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                 No
              </label>
           </div>

       </div>



       <div id="deviceInputsSection" class="w-full" style="display: none;">
          <div id="deviceInputsContainer" class="">

             <div class="device-block flex gap-2">

              <div class="flex flex-col gap-2">
                 <label for="deviceName" class="text-lg">Device Name</label>
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

       <div class="w-full flex flex-col gap-1">

        <label for="hasDevice" class="block text-xl font-medium text-black">Did you come with companions</label>
           <div class="flex items-center gap-4 py-4" >

              <label for="companions-radio-1" class="flex items-center gap-2 text-base font-medium text-gray-900">
                 <input id="companions-radio-1" type="radio" value="yes" required name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                 Yes
              </label>


              <label for="companions-radio-2" class="flex items-center gap-2 text-base font-medium text-gray-900">
                 <input id="companions-radio-2" type="radio" value="no" name="hasCompany" class="relative size-4 appearance-none rounded-full border border-gray-400 bg-white before:absolute before:inset-1 before:rounded-full before:bg-white checked:border-blue-400 checked:bg-blue-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400 disabled:border-gray-300 disabled:bg-gray-100 disabled:before:bg-gray-400 forced-colors:appearance-auto forced-colors:before:hidden [&:not(:checked)]:before:hidden">
                 No
              </label>
           </div>

       </div>

       <div id="companionsInputsSection" style="display: none;" class="w-full">
        <div id="companionsInputsContainer">


           <div class="companion-block flex gap-2">
           <div class="flex flex-col gap-2">
              <label for="companions" class="">Full Name</label>
          <input type="text" placeholder="Kweku Amos" id="companions" name="companions[0][name]" class="companions w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

           </div>
           <div class="flex flex-col gap-2">
              <label for="deviceSerialNumber" class="">Phone Number</label>
          <input type="text" placeholder="0250987654" id="companions" name="companions[0][phone_number]" class="companions w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-slate-600 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />

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

              <div class="w-full">
                <button type="submit"
                    class="bg-gradient-to-b px-10 text-xl rounded-lg py-2 text-white from-[#247EFC] to-[#0C66E4]">
                    Submit
                </button>
            </div>
        </form>
    </main>
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