<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = "divisions";
    protected $primaryKey = "division_id";
    protected $fillable = ["division_name", "description", "status"];

    public function validation()
    {
        return [
            'division_name' => 'required',
            'description'   => 'required',
        ];
    }

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
