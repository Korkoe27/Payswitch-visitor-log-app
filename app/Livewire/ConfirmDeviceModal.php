<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Device;
use Carbon\Carbon;

class ConfirmDeviceModal extends Component
{
    public $showModal = false;
    public $deviceId;
    public $deviceBrand;
    public $serialNumber;
    public $action;

    protected $listeners = ['confirmAction'];

    public function confirmAction($deviceId, $deviceBrand, $serialNumber, $action)
    {
        $this->deviceId = $deviceId;
        $this->deviceBrand = $deviceBrand;
        $this->serialNumber = $serialNumber;
        $this->action = $action;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function processAction()
    {
        $device = Device::find($this->deviceId);
        if (!$device) {
            return redirect()->back()->withErrors(['error' => 'Device not found.']);
        }

        if ($this->action === 'signOut') {
            $device->update([
                'status' => 'signed_out',
                'signed_out_at' => Carbon::now(),
            ]);
        } elseif ($this->action === 'return') {
            $device->update([
                'status' => 'returned',
                'returned_at' => Carbon::now(),
            ]);
        }

        $this->closeModal();
        return redirect()->back()->with('success', 'Device status updated successfully.');
    }

    public function render()
    {
        return view('livewire.confirm-device-modal');
    }
}
