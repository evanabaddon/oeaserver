<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdiRequest extends FormRequest
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
            'nama' => 'required',
            'gambar' => 'required|image',
            'kampus' => 'required|max:255',
            'jenjang' => 'required',
            'id_kategori' => 'required',
            'desc' => 'required|max:255',
            'sibel' => 'required',
            'biaya' => 'required|integer',
            'rate' => '',
            'types' => ''
        ];
    }
}