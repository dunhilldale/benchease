<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Illuminate\Validation\Rules;
use App\Models\User;

class StoreUsersRequest extends FormRequest
{
    // The named route to redirect to if validation fails.
    // protected $redirectRoute = 'users.create';

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
            "first_name"        => "required|min:3|max:50",
            "last_name"         => "required|min:3|max:50",
            "email"             => "required|min:3|max:50|email:rfc,dns|unique:users,email",
            "employee_id"       => "required|min:3|max:50|unique:users,employee_id",
            "password"          => Rules\Password::defaults(),
            "confirmed"         => "required|same:password",
        ];
    }

    /**
     * Naming the attributes
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            "first_name"        => "First Name",
            "middle_name"       => "Middle Name",
            "last_name"         => "Last Name",
            "email"             => "Email Address",
            "employee_id"       => "Employee ID",
            "password"          => "Password",
            "confirmed"         => "Confirm Password",
            "type"              => "Type",
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }
}
