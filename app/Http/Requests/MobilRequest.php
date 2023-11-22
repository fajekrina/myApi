<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobilRequest extends FormRequest
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
            'merek' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required',
            'tarif_harian' => 'required',
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
            'merek.required' => 'A merek is required',
            'model.required' => 'A model is required',
            'nomor_plat.required' => 'A nomor plat is required',
            'tarif_harian.required' => 'A tarif harian is required',
        ];
    }
}
