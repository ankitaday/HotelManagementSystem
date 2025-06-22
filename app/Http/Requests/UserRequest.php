<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this based on your authorization logic if needed
    }

    public function rules()
    {
        $rules = [
            'name' => $this->isMethod('post') ? 'required' : 'sometimes' .'|string|max:255',
            'email' => [$this->isMethod('post') ? 'required' : 'sometimes', 'email', Rule::unique('users')->ignore($this->user)],
            'role' => $this->isMethod('post') ? 'required' : 'sometimes'.'|in:admin,receptionist,guest,housekeeping',
        ];

        // Password required on create, optional on update
        if ($this->isMethod('post')) { // Creating a user
            $rules['password'] = 'required|min:6';
        } else if ($this->isMethod('put') || $this->isMethod('patch')) { // Updating a user
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }
}
