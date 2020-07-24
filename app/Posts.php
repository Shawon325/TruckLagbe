<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = "posts";
    protected $primaryKey = "post_id";
    protected $fillable = ["post_pick_up_time", "post_pick_up_address", "post_pick_drop_address", "accessory_weight", "description", "status"];

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('post_id', 'LIKE', '%' . $search . '%');
    }
}
