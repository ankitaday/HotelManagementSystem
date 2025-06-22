<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change to false if authorization is needed
    }

    public function rules()
    {
        $rules = [
            'room_id'       => $this->isMethod('post') ? 'required|exists:rooms,id' : 'sometimes|exists:rooms,id',
            'customer_name' => $this->isMethod('post') ? 'required|string|max:255' : 'sometimes|string|max:255',
            'customer_email'=> $this->isMethod('post') ? 'required|email|max:255' : 'sometimes|email|max:255',
            'customer_phone'=> $this->isMethod('post') ? 'required|string|max:15' : 'sometimes|string|max:15',
            'check_in'      => $this->isMethod('post') ? 'required|date|after_or_equal:today' : 'sometimes|date|after_or_equal:today',
            'check_out'     => $this->isMethod('post') ? 'required|date|after:check_in' : 'sometimes|date|after:check_in',
            'guests'        => $this->isMethod('post') ? 'required|integer|min:1' : 'sometimes|integer|min:1',
            'status'        => $this->isMethod('post') ? 'required|in:pending,confirmed,cancelled' : 'sometimes|in:pending,confirmed,cancelled',
            'special_requests' => 'nullable|string|max:500',
        ];

        return $rules;
    }
}
