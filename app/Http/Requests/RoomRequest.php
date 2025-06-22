<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change to false if authorization is needed
    }

    public function rules()
    {
        $rules = [
            'room_number'  => $this->isMethod('post') ? 'required|unique:rooms' : 'sometimes',           'room_type'    => $this->isMethod('post') ? 'required' : 'sometimes' . '|in:Single,Double,Suite',
            'floor'        => $this->isMethod('post') ? 'required' : 'sometimes' . '|in:1st,2nd,3rd',
            'bed_count'    => $this->isMethod('post') ? 'required|integer|min:1' : 'sometimes|integer|min:1',
            'view'         => 'nullable|in:City,Garden,Sea,Pool',
            'has_balcony'  => 'boolean',
            'amenities'    => 'nullable|json',
            'max_occupancy'=> $this->isMethod('post') ? 'required|integer|min:1' : 'sometimes|integer|min:1',
            'ac_type'      => $this->isMethod('post') ? 'required' : 'sometimes' . '|in:AC,Non-AC',
            'price'        => $this->isMethod('post') ? 'required|numeric|min:0' : 'sometimes|numeric|min:0',
            'status'       => $this->isMethod('post') ? 'required' : 'sometimes' . '|in:available,occupied,maintenance',
            'availability' => 'boolean',
            'description'  => 'nullable|string',
        ];

        return $rules;
    }
}
