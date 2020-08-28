<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Truck extends Model
{
    protected $table = "trucks";
    protected $primaryKey = "truck_id";
    protected $fillable = ["truck_number", "ton", "has_image", "status", "created_by"];

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

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->created_by = Auth::user()->id;
        });
    }
}
