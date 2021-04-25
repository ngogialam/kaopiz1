<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' =>'required|email',
            'password' => 'required',
            'phone' =>['required', function($attribute, $value, $fail){
                if (substr($value,0,3)!=='+84'){
                    $fail($attribute.'is invalid');
                }
            }]
        ];
    }
    public function messages()
    {
        return ['email.required' => 'The email is required'];
    }
}
