<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostBid extends Model
{
    protected $table = "post_bids";
    protected $primaryKey = "post_bid_id";
    protected $fillable = ["post_id", "truck_driver_id", "truck_number", "phone_number", "bid_amount", "status"];

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }

    public function post()
    {
        return $this->belongsTo(Posts::class, "post_id");
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('truck_number', 'LIKE', '%' . $search . '%');
    }
}
