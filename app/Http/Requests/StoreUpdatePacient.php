<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePacient extends FormRequest
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
        $id = $this->segment(2);

        $rules = [
            'name' => ['required', 'min:10', 'max:250'],
            'year' => ['required'],
            'cpf' => [
                'required',
                'min:14',
                'max:14',
                Rule::unique('pacients')->ignore($id),
            ],
            'wpp' => ['required', 'min:15', 'max:15'],
            'image' => ['required', 'image'],
        ];

        if($this->method() == 'PUT'){
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }
}
