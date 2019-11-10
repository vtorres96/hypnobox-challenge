<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'telefone' => 'required|max:15',
            'email' => 'email|max:80',
            'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
