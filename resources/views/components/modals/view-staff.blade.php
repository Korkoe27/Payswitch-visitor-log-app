<div class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-[2px] ">
    <!-- When there is no desire, all things are at peace. - Laozi -->
    @foreach ($employees as $employee)
            <dialog class="flex flex-col gap-4 rounded-lg bg-white m-auto w-1/4">

                <section class="flex flex-col p-4">
                    {{-- <div class="flex flex-col gap-2"> --}}
                        <h2 class="text-black font-normal">Name: <span>{{$employee['first_name']}} {{$employee['last_name']}}</span></h2>
                    {{-- </div> --}}

                    <h2 class="">Email: <span class="">{{$employee['email']}}</span></h2>

                    <h2 class="">Department: <span class="">{{$employee['department_id']}}</span></h2>

                    <h2 class="">Role: <span class="">{{$employee['job_title']}}</span></h2>

                    <h2 class="">Phone: <span class="">{{$employee['phone_number']}}</span></h2>

                    
                </section>

    </dialog>
    @endforeach



</div>