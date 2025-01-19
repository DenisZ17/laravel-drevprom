<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Shipment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public $sortColumn = "order";

    // public function setSort($nameColumn){
    //     dd($this->sortColumn);
    //     $this->sortColumn = $nameColumn;
    //     dd($this->sortColumn);
    // }
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
       return view('home', [
        'shipments' => Shipment::activeShipments()->orderBy("shipment_date", "asc")->get(),
        'details' => Detail::orderBy($this->sortColumn, "asc")->get(),
       ]);
    }
}
