<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $table = "trucks";
    protected $primaryKey = "truck_id";
    protected $fillable = ["truck_number", "ton", "address", "has_image", "status"];

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }

    public function truck_ton()
    {
        return $this->belongsTo(ton::class, "ton");
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('truck_number', 'LIKE', '%' . $search . '%');
    }
}
