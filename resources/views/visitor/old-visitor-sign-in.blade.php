<x-layout>

    <x-slot:heading>
        Sign In
    </x-slot:heading>

    <main class="">
        <div class="flex flex-col">
            <div class="">
                <h4>{{ $visitor->first_name }}  {{ $visitor->last_name }}</h4>
                <h4 class="">{{ $visitor->company_name }}</h4>  
                <h4 class="">{{ $visitor->email }}</h4>
                <h4 class="">{{ $visitor->phone_number }}</h4>
            </div>
        </div>
        <form action="" method="post"></form>
    </main>


</x-layout>