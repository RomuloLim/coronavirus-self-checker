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
            'wpp' => ['required', 'min:14', 'max:15'],
            'image' => ['required', 'image'],
        ];

        if($this->method() == 'PUT'){
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }

    public function messages()
    {
        return[
            'name.required' => 'Informe o nome do paciente',
            'name.min' => 'Preencha seu nome completo',
            'name.max' => 'Preencha apenas seu nome no campo correspondente',
            'year.required' => 'Informe a data de nascimento do paciente',
            'cpf.required' => 'Informe o CPF do paciente',
            'cpf.min' => 'CPF inválido',
            'cpf.max' => 'CPF inválido',
            'cpf.unique' => 'O CPF informado já existe na base de dados',
            'wpp.required' => 'Informe o WhatsApp do paciente',
            'wpp.min' => 'Número inválido',
            'wpp.max' => 'Número inválido',
            'image.required' => 'Informe uma imagem para o paciente',
            'image.image' => 'Faça upload apenas de imagens'
        ];
    }
}
