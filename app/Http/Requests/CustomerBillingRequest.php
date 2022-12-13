<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerBillingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'apt_or_unit' => 'required',
            'address'   => 'required',
            'city'      => 'required',
            'state_id'     => 'required|exists:states,id',            
            'zip'       => 'required', 

            'card_number' => 'required',
            'exp_month'   => 'required',
            'exp_year'    => 'required',
            'cvc'         => 'required',
        ];

        return $rules;
    }
}
