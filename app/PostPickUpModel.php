<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPickUpModel extends Model
{
    protected $table = "post_pick_up_address";
    protected $primaryKey = "post_pick_up_address_id";
    protected $fillable = ["post_id", "division_id", "district_id", "upzilla_id", "home_address", "status"];

    public function division()
    {
        return $this->belongsTo(Division::class, "division_id");
    }

    public function district()
    {
        return $this->belongsTo(District::class, "district_id");
    }

    public function upzilla()
    {
        return $this->belongsTo(Upzilla::class, "upzilla_id");
    }
}
