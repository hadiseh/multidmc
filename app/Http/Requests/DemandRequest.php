<?php

namespace App\Http\Requests;

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

            'telephone_code' => 'required|int',
            'telephone' => 'required|int', // mobile authentication must be done
            'phone_code' => 'required|int',
            'phone' => 'required|int',// mobile authentication must be done
            'language_id' => 'required|int',
            'code' => 'unique:demands',
            'email' => 'required|email',
            'website' => 'nullable|url', // if not empty

        ];
    }


}
