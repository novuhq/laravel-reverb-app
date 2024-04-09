<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\PackageSent;

class DeliveryHistory extends Component
{
    public array $packageStatuses = [
    ];

    public string $status = '';

    public function submitStatus()
    {
        PackageSent::dispatch(auth()->user()->name, $this->status, Carbon::now());

        /**
         *  Trigger Novu to fire the in-app notifications
         */
        novu()->triggerEvent([
            'name' => 'laravel-in-app-notifications',
            'payload' => [
                'deliveryStatus' => $this->status,
                'deliveryHandler' => auth()->user()->name
            ],
            'to' => [
                'subscriberId' => auth()->user()->id,
            ]
        ])->toArray();

        $this->reset('status');
    }

    #[On('echo-private:delivery,PackageSent')]
    public function onPackageSent($event)
    {
        $this->packageStatuses[] = $event;
    }

    public function render()
    {
        return view('livewire.delivery-history');
    }
}