<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeminjamanRequest extends FormRequest
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
            'mobil_id' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobil_id.required' => 'A mobil is required',
            'tgl_awal.required' => 'A tgl awal is required',
            'tgl_akhir.required' => 'A tgl akhir is required',
        ];
    }
}
