<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
        'shipment_date',
        'active',
        'info',
    ];


    public function scopeActiveShipments($query)
    {
        $query->where('active', true);
    }
    public function details()
    {
        return $this->belongsToMany(Detail::class);
    }

}
