<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upzilla extends Model
{
    protected $table = "upzillas";
    protected $primaryKey = "upzilla_id";
    protected $fillable = ["upzilla_name","district_name", "description", "status"];

    public function validation()
    {
        return [
            'upzilla_name' => 'required',
            'district_name' => 'required',
            'description'   => 'required',
        ];
    }

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
 