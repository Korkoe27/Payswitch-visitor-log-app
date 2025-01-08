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
            <form action="{{ url('visit') }}" method="POST" class="flex flex-wrap pr-6 lg:grid lg:grid-cols-2">

                @csrf

                {{-- @if($errors->any())
                    <div class="w-full px-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <ul class="">
                                @foreach ($errors->all() as $error)
                                    <li class="">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div> --}}

                <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="first_name" class="mb-[10px] block text-base font-medium text-black">
                        First Name <span class="text-red-400">*</span>
                       </label>
                       <input type="text" name="first_name" id="first_name" placeholder="eg..Jane" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>

                    @error('first_name')
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
                 </div>


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
                       <input type="text" placeholder="Visitee" required name="employee" id="employee" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('employee')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="purpose" class="mb-[10px] block text-base font-medium text-black">
                       Purpose of Visit <span class="text-red-400">*</span>
                       </label>
                       <div class="">
                          <select  name="purpose" id="purpose" class=" w-full appearance-none rounded-lg border border-slate-400 bg-transparent py-5 px-5 text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2">
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
                       <label for="devices" class="mb-[10px] block text-base font-medium text-black">
                       Serial Number of Device
                       </label>
                       <input type="text" placeholder="HP12345" id="devices" name="devices" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('devices')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>

                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label for="dependents" class="mb-[10px] block text-base font-medium text-black">
                       Who did you come with?
                       </label>
                       <input type="text" placeholder="John Doe" name="dependents" id="dependents" class="w-full bg-transparent rounded-md border border-slate-400 py-5 px-5 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2 disabled:border-gray-2" />
                    </div>
                    @error('dependents')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                 <div class="w-full px-4 md:w-1/2 lg:w-1/2">
                    <div class="mb-12">
                       <label class="mb-[10px] block text-base font-medium text-black" id="comment">
                       Comment
                       </label>
                       <div class="">
                          <textarea type="textarea" rows="6" placeholder="Any other information" class="w-full bg-transparent rounded-md lg:h-20 md:h-30 resize-none border border-slate-400 p-3 text-dark-6 outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-gray-2"></textarea>
                       </div>
                    </div>
                    @error('comment')
                    <div class="text-red-500 italic font-normal text-sm">{{ $message }}</div>
                    @enderror
                 </div>
                

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