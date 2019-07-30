<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            //
            "Name" => "required|string|min:2",
            "Image" => "required|image",
            "Email" => "required|email",
            "Password" => "required|min:6",
            "Repeat_password" => "required_with:Password|same:Password|min:6",
        ];
    }
}