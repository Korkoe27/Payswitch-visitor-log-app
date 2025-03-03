<x-layout>

    <x-slot:heading>
        {{-- {{ $visitor->first_name  ?? 'New'}} {{ $visitor->last_name  ?? 'User'}} --}}

        Visit Details
    </x-slot:heading>


    <div class="grid grid-cols-2">
        <div class="p-4">
            <div class="flex flex-col gap-4">
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="first_name" class="font-bold">Visitor</label>
                        <p>{{ $visitor->first_name }} {{ $visitor->last_name }}</p>
                    </div>
                    <div class="w-1/2">
                        <label for="employee" class="font-bold">Visiting</label>
                        <p>{{ $visitor->visitee->first_name }} {{ $visitor->visitee->last_name }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="email" class="font-bold">Email</label>
                        <p>{{ $visitor->email }}</p>
                    </div>
                    <div class="w-1/2">
                        <label for="phone" class="font-bold">Phone</label>
                        <p>{{ $visitor->phone_number }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="company" class="font-bold">Company</label>
                        <p>{{ $visitor->company_name }}</p>
                    </div>
                    <div class="w-1/2">
                        <label for="purpose" class="font-bold">Purpose</label>
                        <div class="capitalize">
                            @switch($visitor['purpose'])
                            @case('personal')
                                <span class="text-green-500">{{ $visitor['purpose'] }}</span>
                                @break
                            @case('interview')
                                <span class="text-yellow-500">{{ $visitor['purpose'] }}</span>
                                @break
                            @case('official')
                                <span class="text-red-600">{{ $visitor['purpose'] }}</span>
                                @break
                            @default
                                <span class="text-blue-600">{{ $visitor['purpose'] }}</span>
                        @endswitch
                        </div>
                    </div>
                    

                </div>  
                
                {{-- <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="company" class="font-bold">Devices</label>

                        @foreach(($visitor->devices) as $row)
                            @foreach ($row as $device => $values)
                            <p class="uppercase">{{$device}} {{ $values }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div> --}}
                @if($visitor->devices && count($visitor->devices) > 0)
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="company" class="font-bold">Devices</label>
                        @foreach(($visitor->devices) as $row)
                            @foreach ($row as $device => $values)
                                <p class="uppercase">{{$device}} {{ $values }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endif
                @if(!empty($visitor->companions))
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="company" class="font-bold">Companions</label>
                        @foreach($visitor->companions as $row)
                            @foreach($row as $companions => $values)
                                <p class="uppercase"> {{ $values }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="w-1/2">
                <label for="company" class="font-bold">Access Cards</label>
                @if(!empty($visitor?->access_cards) && is_array($visitor->access_cards))
                    @foreach($visitor->access_cards as $cards)
                        @foreach($cards as $card => $values)
                            <p class="uppercase">{{ $values }}</p>
                        @endforeach
                    @endforeach
                @else
                    <p>No cards</p>
                @endif
            </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="time_in" class="font-bold">Time In</label>
                        <p>{{ $visitor->created_at->format('H:i') }}</p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-1/2">
                        <label for="time_in" class="font-bold">Departed At</label>
                        <p class="text-xl text-green-900">{{ $visitor->departed_at ? $visitor->departed_at->format('H:i') : 'Visit Ongoing' }}</p>
                    </div>
                </div>
                    



            </div>
        </div>
        {{-- <div class="p-4">
            <h2 class="font-bold">Actions</h2>
            <div class="flex gap-4">
                <a href="{{ url('visit/' . $visitor->id . --}}
    </div>



</x-layout>