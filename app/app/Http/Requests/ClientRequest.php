<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_client' => 'required|min:3|max:255',
            'date_of_birth' => 'required|date',
            'document' => 'required|min:11|max:18',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name_social' => 'nullable|min:3|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name_client.required' => 'O campo nome é obrigatório',
            'name_client.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'name_client.max' => 'O campo nome deve ter no máximo 255 caracteres',
            'date_of_birth.required' => 'O campo data de nascimento é obrigatório',
            'date_of_birth.date' => 'O campo data de nascimento deve ser uma data válida',
            'document.required' => 'O campo documento é obrigatório',
            'document.min' => 'O campo documento deve ter no mínimo 11 caracteres',
            'document.max' => 'O campo documento deve ter no máximo 14 caracteres',
            'image.image' => 'O arquivo deve ser uma imagem',
            'image.mimes' => 'O arquivo deve ser do tipo jpeg, png, jpg, gif ou svg',
            'image.max' => 'O arquivo deve ter no máximo 2048 kilobytes',
            'name_social.min' => 'O campo nome social deve ter no mínimo 3 caracteres',
            'name_social.max' => 'O campo nome social deve ter no máximo 255 caracteres',
        ];
    }
}
