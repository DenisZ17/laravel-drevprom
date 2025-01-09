<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function create()
    {
        return view('shipment.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            rules: [
                'shipment_date' => 'required',
                'info' => 'max:50'
            ]
        );



        Shipment::create($data);

        return redirect(to: route('dashboard'))->with('shipment_added', 'Отгрузка успешно добавлена!');

    }

    public function edit(Shipment $shipment)
    {
        return view('shipment.edit', ['shipment' => $shipment]);
    }

    public function update(Request $request, Shipment $shipment)
    {

        $request->validate([
            'shipment_date' => 'required',
            'info' => 'max:50',
        ]);

        $shipment->update([
            'shipment_date' => $request->shipment_date,
            'info' => $request->info,
            'active' => $request->active == 'on' ? 1 : 0,
        ]);

        return redirect(to: route('home'))->with('successed', 'Отгрузка обновлена успешно!');
    }
    public function destroy(Shipment $shipment)
    {
        $shipment->delete();
        return redirect(to: route('home'))->with('success', 'Отгрузка удалена успешно!');
    }

}
