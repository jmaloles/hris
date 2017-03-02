<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicantRequest extends FormRequest
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
            'first_name'            => 'required',
            'middle_initial'        => 'required',
            'last_name'             => 'required',
            'email'                 => 'required|email|unique:applicants,email',
            'address'               => 'required',
            'date_of_birth'         => 'required|date',
            'mobile_number'         => array('required_if:home_number,""', 'regex:/(\+63|0)9+[0-9]{9}/i', 'nullable'),
            'home_number'           => array('required_if:mobile_number,""', 'digits:7', 'nullable'),
            'gender'                => 'required',
            'expected_salary'       => 'required',
            'job_position'          => 'required',
            'type_of_employment'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'   => 'First Name is required',
            'last_name.required'    => 'Last Name is required',
            'email.required'        => 'E-mail is required',
            'address.required'      => 'Address is required',
            'date_of_birth'         => 'Date of birth is required',

            'email.unique'          => 'E-mail: ' . $this->request->get('email') . ' already exist',
        ];
    }
}
