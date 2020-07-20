<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckImages extends Model
{
    protected $table = "truck_images";
    protected $primaryKey = "truck_image_id";
    protected $fillable = ["truck_id", "images", "status"];

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
