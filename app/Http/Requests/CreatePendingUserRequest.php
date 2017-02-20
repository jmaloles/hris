<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePendingUserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'employee_id' => 'required|unique:pending_users,employee_id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:pending_users,email'
        ];
    }

    public function messages()
    {
        return [
            'employee_id.required' => 'Employee ID is required',
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'email.required' => 'E-mail is required',

            'employee_id.unique' => 'Employee ID ' . $this->request->get('employee_id') . ' already exist',
            'email.unique' => 'E-mail: ' . $this->request->get('email') . ' already exist',
        ];
    }
}
