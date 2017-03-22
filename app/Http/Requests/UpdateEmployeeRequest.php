<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            // APPLICANT FIELD
            'first_name'        => 'required',
            'middle_initial'    => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email|unique:applicants,email,'.$this->request->get('applicant_id'),
            'address'           => 'required',
            'date_of_birth'     => 'required|date',
            'mobile_number'     => array('required_if:home_number,""', 'regex:/(\+63|0)9+[0-9]{9}/i', 'nullable'),
            'home_number'       => array('required_if:mobile_number,""', 'digits:7', 'nullable'),
            'gender'            => 'required',
            'fileToUpload'      => 'mimes:jpeg,png,jpg|nullable',
            // EMPLOYEE FIELD
            'company_email'     => 'nullable|email|unique:employees,email,'.$this->request->get('employee_id'),
            'sss'               => array('unique:employees,sss,'.$this->request->get('employee_id'), 'regex:/^[0-9]{2}[-][0-9]{3}[-][0-9]{2}[-][0-9]{2}[-][0-9]{1}$/i', 'nullable'),
            'philhealth'        => array('unique:employees,philhealth,'.$this->request->get('employee_id'), 'regex:/^[0-9]{4}[-][0-9]{5}[-][0-9]{2}[-][0-9]{2}$/i', 'nullable'),
            'pag_ibig'          => array('unique:employees,pag_ibig,'.$this->request->get('employee_id'), 'regex:/^[0-9]{4}[-][0-9]{4}[-][0-9]{4}$/i', 'nullable'),
            'tin'               => array('unique:employees,tin,'.$this->request->get('employee_id'), 'regex:/^[0-9]{2}[-][0-9]{7}$/i', 'nullable'),
            'nbi_clearance'     => 'required'
        ];
    }
}
