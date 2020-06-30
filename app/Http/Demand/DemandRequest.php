<?php

namespace App\Http\Demand;

use Illuminate\Foundation\Http\FormRequest;

class DemandRequest extends FormRequest
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

            'telephone' => 'required|int',
            'phone' => 'required|int',
            'language_id' => 'required|int',
            'code' => 'unique',
            'email' => 'required|email',
            'website' => 'nullable|url', // if not empty

        ];
    }

    public function messages()
    {
        return[
            'code.unique'=> 'code is Duplicate'
        ];
    }
}
