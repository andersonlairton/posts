<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'titulo'=>'required|max:50',
            'descricao'=>'required|max:255',
            'url_imagem'=>'required|max:255'
        ];
    }
    public function messages()
    {
        return ['required'=>':attribute não pode ser vazio.',];
    }
}
