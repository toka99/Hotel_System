<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            
                'name'              => 'required',
                'phone'             => 'required|numeric|regex:/(01)[0-9]{9}/|unique:receptionists',
               // 'level'             => 'required|in:manager,receptionist,client',
                'email'             => 'required|email|unique:receptionists,email',
                'password'          => 'required|min:8',
                'national_id'       => 'required|min:14|unique:receptionists,national_id',
                'confirm_password'  => 'required|same:password'
            
        ];

      
    }


    public function messages()
    {
        return [

            'name.required' =>'Name must be filled!!' ,

            'phone.required' =>'Phone must be filed!!' ,

            'phone.numeric' =>'Phone must be numbers only!!' ,

            'phone.regex' =>'Phone is not valid!!' ,

            'email.required' =>'Email must be filled!!' ,

            'email.unique' =>'This Email has already taken!!' ,

            'password.requires' =>'Password must be filed!!' ,

            'password.min' =>'Password must be at least 8 characters!!' ,

            'national_id.required' =>'National_is must be filled!!' ,

            'national_id.min' =>'National_is must be 14 characters only!!' ,

            'national_id.unique' =>'National_is must be unique!!' ,

        ];

    }
}