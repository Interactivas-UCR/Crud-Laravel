<?php

namespace TRAINERPOKEMON\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePokemonRequest extends FormRequest
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
            'type' => 'required',
            'level' => 'required',
            'nickname' => 'required',
            'imagen_pokemon' => 'image|nullable|max:1999',
            'trainer' => 'required'
        ];
    }
}
