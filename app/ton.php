<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ton extends Model
{
    protected $table = "tons";
    protected $primaryKey = "ton_id";
    protected $fillable = ["ton_number", "description", "status"];

    public function validation()
    {
        return [
            'ton_number' => 'required',
            'description'   => 'required',
        ];
    }

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
