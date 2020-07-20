<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "districts";
    protected $primaryKey = "district_id";
    protected $fillable = ["district_name", "division_name", "description", "status"];

//    public function validation()
//    {
//        return [
//            'district_name' => 'required',
//            'division_name' => 'required',
//            'description' => 'required',
//        ];
//    }

    public function scopeSearch($query, $search)
    {
        return $query->where('district_name', 'LIKE', '%' . $search . '%');
    }

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
