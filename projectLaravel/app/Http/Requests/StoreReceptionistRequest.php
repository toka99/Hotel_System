<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceptionistRequest extends FormRequest
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
        $rules =  [
            'name'              => 'required',
            'phone'             => 'required|numeric|regex:/(01)[0-9]{9}/|unique:receptionists',
            'email'             => 'required|email|unique:receptionists,email',
            'password'          => 'required|min:8',
            'national_id'       => 'required|min:14|unique:receptionists,national_id',
            'confirm_password'  => 'required|same:password'
        ];
        if ($this->getMethod() == 'POST') {
            $rules += ['name'              => 'required'];
        }else {
            $rules += ['name'              => 'required,name,'.$this->receptionist->id];
        }

        return $rules;
    }

}
