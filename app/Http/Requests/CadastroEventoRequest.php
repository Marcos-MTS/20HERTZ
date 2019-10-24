<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastroEventoRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'titulo' => "required|string|max:100",
            'descricao' => "required|string|max:10000",
            'data_evento' => "required|string",
            'hora_evento' => "required|string"
        ];
    }

}
