<?php

namespace App\Livewire;

use App\Models\Shipment;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class ShipmentList extends Component
{
    #[Url()]
    public $sort = "asc";

    public function setSort() {
        if ($this->sort == "asc") {
            $this->sort = "desc";
            return;
        }
        if($this->sort == "desc") {
            $this->sort = "asc";
        return;}

    }
    #[Computed()]
    public function shipments()  {
        return Shipment::take(5)->orderBy('shipment_date', $this->sort)->get();
    }
    public function render()
    {
        return view('livewire.shipment-list');
    }
}
