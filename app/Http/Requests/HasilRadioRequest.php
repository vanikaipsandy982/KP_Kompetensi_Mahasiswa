<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HasilRadioRequest extends FormRequest
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
            'inlineRadioOptions1' => 'required',
            'inlineRadioOptions2' => 'required',
            'inlineRadioOptions3' => 'required',
            'inlineRadioOptions4' => 'required',
            'inlineRadioOptions5' => 'required',
            'inlineRadioOptions6' => 'required',
            'inlineRadioOptions7' => 'required',
            'inlineRadioOptions8' => 'required',
            'inlineRadioOptions9' => 'required',
            'inlineRadioOptions10' => 'required',
        ];
    }
}
