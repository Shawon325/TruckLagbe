<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = "general_settings";
    protected $primaryKey = "general_setting_id";
    protected $fillable = ["app_name", "email", "number", "logo"];

    public function validation()
    {
        return [
            'app_name' => 'required',
            'email'   => 'required',
            'number'   => 'required',
            'logo'   => 'required',
        ];
    }
}
