<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
public function rules()
{
    return [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required|min:10'
    ];
}
}