<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContainerRequest extends FormRequest
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
            // Container Table
            'code_id' => 'required',
            'vendor'=> 'required',
            'measure' => 'required',
            'receiving' => 'required',

            // Detail Table
            'style_no' => 'required',
            'uom' => 'required',
            'prefix' => 'required',
            'height' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute not null',
        ];
    }
    public function attributes()
    {
        return [
             // Container Table
             'code_id' => 'Code ID',
             'vendor'=> 'Vendor',
             'measure' => 'Measure',
             'receiving' => 'Receiving',
 
             // Detail Table
             'style_no' => 'Style No',
             'uom' => 'UOM',
             'prefix' => 'Prefix',
             'height' => 'Height'
        ];
    }
}
