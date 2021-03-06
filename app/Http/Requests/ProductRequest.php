<?php

namespace AgulhasMimos\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required',
            'price' => 'required',
            'group' => 'required'
        ];
    }

        public function messages()
    {
        return [
            'name.required' => 'Nome não pode ser vazio.',
            'price.required' => 'Preço não pode ser vazio.',
            'group.required' => 'Grupo não pode ser vazio.'
        ];
    }
}
