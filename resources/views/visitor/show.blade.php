<x-layout>
    <x-slot:heading>
        Visit Details
    </x-slot:heading>

    <div class="mx-5 mb-4 text-[#44546F] text-xs font-[700] bg-white border border-gray-200 rounded-lg">
        <div class="border-b border-gray-200 rounded-t-lg bg-[#F1F1F1] p-3">
            <h2 class="text-sm font-semibold text-[#172B4D]">Visitor Information</h2>
        </div>

        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Visitor:</span>
            <span class="font-bold">{{ $visitor->first_name }} {{ $visitor->last_name }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Email:</span>
            <span class="">{{ $visitor->email }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Phone:</span>
            <span class="">{{ $visitor->phone_number }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Visitee:</span>
            <span class="">{{ $visitor->visitee->first_name }} {{ $visitor->visitee->last_name }}</span>
        </div>
        <div class="flex justify-between p-3">
            <span class="text-[#848A9C] font-medium">Company:</span>
            <span class="">{{ $visitor->company_name }}</span>
        </div>
    </div>

    <div class="mx-5 mb-4 text-[#44546F] text-xs font-[700] bg-white border border-gray-200 rounded-lg">
        <div class="border-b border-gray-200 rounded-t-lg bg-[#F1F1F1] p-3">
            <h2 class="text-sm font-semibold text-[#172B4D]">Visit Details</h2>
        </div>

        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Purpose:</span>
            <span class="font-bold capitalize 
                @if($visitor->purpose == 'personal') text-green-500 bg-green-50 
                @elseif($visitor->purpose == 'interview') text-amber-500 bg-amber-50 
                @elseif($visitor->purpose == 'official') text-red-500 bg-red-100 
                @else text-blue-500 bg-blue-100 
                @endif px-3 py-1 rounded-full">
                {{ $visitor->purpose }}
            </span>
        </div>
        <div class="flex justify-between border-b border-gray-100 p-3">
            <span class="text-[#848A9C] font-medium">Date/Time In:</span>
            <span class="font-bold">{{ $visitor->created_at->format('D, d F Y H:i') }}</span>
        </div>
        <div class="flex justify-between p-3">
            <span class="text-[#848A9C] font-medium">Departed:</span>
            <span class="font-bold">
                {{ $visitor->departed_at ? $visitor->departed_at->format('D, d F Y H:i') : 'Visit ongoing' }}
            </span>
        </div>
    </div>

    <div class="mx-5 mb-4 text-[#44546F] text-xs font-[700] bg-white border border-gray-200 rounded-lg">
        <div class="border-b border-gray-200 rounded-t-lg bg-[#F1F1F1] p-3">
            <h2 class="text-sm font-semibold text-[#172B4D]">Devices</h2>
        </div>

        @if(!empty($visitor->devices))
            @foreach($visitor->devices as $device)
                <div class="flex justify-between border-b border-gray-100 p-3">
                    <span class="text-[#848A9C] font-medium">{{ $device['name'] }}:</span>
                    <span class="font-bold">{{ $device['serial'] }}</span>
                </div>
            @endforeach
        @else
            <div class="p-3 text-gray-500">Did not bring any device.</div>
        @endif
    </div>

    <div class="mx-5 mb-4 text-[#44546F] text-xs font-[700] bg-white border border-gray-200 rounded-lg">
        <div class="border-b border-gray-200 rounded-t-lg bg-[#F1F1F1] p-3">
            <h2 class="text-sm font-semibold text-[#172B4D]">Companions</h2>
        </div>

        @if(!empty($visitor->companions))
            @foreach($visitor->companions as $companion)
                <div class="flex justify-between border-b border-gray-100 p-3">
                    <span class="text-[#848A9C] font-medium">Name:</span>
                    <span class="font-bold uppercase">{{ $companion['name'] }}</span>
                </div>
            @endforeach
        @else
            <div class="p-3 text-gray-500">No companions.</div>
        @endif
    </div>

    <div class="mx-5 mb-4 text-[#44546F] text-xs font-[700] bg-white border border-gray-200 rounded-lg">
        <div class="border-b border-gray-200 rounded-t-lg bg-[#F1F1F1] p-3">
            <h2 class="text-sm font-semibold text-[#172B4D]">Access Cards</h2>
        </div>

        @if(count($access_cards) > 0)
            @foreach($access_cards as $card)
                <div class="flex justify-between border-b border-gray-100 p-3">
                    <span class="text-[#848A9C] font-medium">Card Number:</span>
                    <span class="font-bold">{{ $card->card_number }}</span>
                </div>
            @endforeach
        @else
            <div class="p-3 text-gray-500">No cards assigned.</div>
        @endif
    </div>
</x-layout>
