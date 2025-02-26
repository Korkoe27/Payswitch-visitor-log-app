<dialog id="signOutDialog" class="absolute left-0 right-0 backdrop:bg-black/50 bottom-0 top-0 w-fit h-fit p-10" wire:ignore.self>
    @if ($showModal)
        <div class="bg-white/10 flex-col flex gap-4">
            <h1 class="text-center">{{ $action === 'signOut' ? 'Sign Out Device' : 'Return Device' }}</h1>
            <form wire:submit.prevent="processAction" class="flex-col flex gap-4 justify-between">
                @csrf
                <p>Are you sure you want to {{ $action === 'signOut' ? 'sign out' : 'return' }} this device?</p>
                <p><strong>Brand:</strong> {{ $deviceBrand }}</p>
                <p><strong>Serial Number:</strong> {{ $serialNumber }}</p>
                <div class="flex justify-between">
                    <button type="button" wire:click="closeModal" class="border border-red-300 text-red-500 rounded px-5 py-3">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-400 text-white rounded-lg px-5 py-3">
                        {{ $action === 'signOut' ? 'Sign Out' : 'Return' }}
                    </button>
                </div>
            </form>
        </div>
    @endif
</dialog>
