<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'title',
        'shipment_id',
        'order',
        'size',
        'status',
        'place',
        'quantity',
        'color',
        'info',
        'active',
    ];
    public function shipment (){
        return $this->belongsTo(Shipment::class);
    }

    public function scopeActiveDetails($query)
    {
        $query->where('active', true);
    }
}
