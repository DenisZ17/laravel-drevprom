<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index() {
        return view('detail.index', [

            'details' => Detail::orderBy('order')->get(),
        ]);
    }


    public function show(Detail $detail) {
        return view('detail.show', [
            'detail' => $detail,
        ]);
    }

    public function create() {

        return view('detail.create', [
        'shipments' => Shipment::activeShipments()->get(),
        ]
    );
    }
    public function store(Request $request) {
        $data = $request->validate(
            [
                'title' => 'required|max:20',
                'shipment_id' => 'required',
                'order' => 'required|max:20',
                'size' => 'required|max:30',
                'status' => 'required',
                'place' => 'required',
                'quantity' => 'required',
                'color' => 'required',
                'info' => 'max:50',
                'active' => 'boolean',
                ]
        );
        Detail::create($data);
        return redirect(route('home'))->with('detail_created', 'Деталь создана успешно!');
    }

    public function edit(Detail $detail) {
        return view("detail.edit", [

            'detail' => $detail,
        ]);
    }

    public function update(Request $request, Detail $detail){
        $request->validate([
            'title' => 'required|max:20',
                'shipment_id' => 'required',
                'order' => 'required|max:20',
                'size' => 'required|max:30',
                'status' => 'required',
                'place' => 'required',
                'quantity' => 'required',
                'color' => 'required',
                'info' => 'max:50',

        ]);
        $detail->update([
            'title' => $request->title,
                'shipment_id' => $request->shipment_id,
                'order' => $request->order,
                'size' => $request->size,
                'status' => $request->status,
                'place' => $request->place,
                'quantity' => $request->quantity,
                'color' => $request->color,
                'info' => $request->info,
                'active' => $request->active == 'on' ? 1 : 0,
        ]);
        return redirect(route('home'))->with('detail_update', 'Деталь успешно обновлена!');
    }

    public function destroy(Detail $detail)
    {
        $detail->delete();
        return redirect(to: route('home'))->with('detail_delete', 'Деталь удалена успешно!');
    }
}
