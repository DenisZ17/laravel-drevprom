<?php

namespace App\Livewire;

use App\Models\Detail;
use App\Models\Shipment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class DetailHomedesc extends Component
{

    #[Computed()]

    #[Url()]


    // public function shipments(){
    //     return Shipment::activeShipments()->orderBy("shipment_date", "asc")->get();
    // }
    public function details(){
        return Detail::activeDetails()->orderBy('title', 'asc')->get();
    }


    public function render()
    {
        return view('livewire.detail-homedesc');
    }

}
