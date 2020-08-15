<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBidRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => 'required',
            'truck_driver_id' => 'required',
            'truck_number' => 'required',
            'bid_amount' => 'required',
            'status' => 'required',
        ];
    }
}