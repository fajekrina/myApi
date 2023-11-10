<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MachineRequest extends FormRequest
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
            'type_id' => 'required',
            'brand_id' => 'required',
            'machine_name' => 'required',
            'machine_status' => 'required',
            'purchase_price' => 'required',
            'purchase_date' => 'required',
            'warehouse_location' => 'required',
            'station_location' => 'required',
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
            'type_id.required' => 'A type is required',
            'brand_id.required' => 'A brand is required',
            'machine_name.required' => 'A machine name is required',
            'machine_status.required' => 'A machine status is required',
            'purchase_price.required' => 'A purchase price is required',
            'purchase_date.required' => 'A purchase date is required',
            'warehouse_location.required' => 'Awarehouse location is required',
            'station_location.required' => 'A station location is required',
        ];
    }
}
