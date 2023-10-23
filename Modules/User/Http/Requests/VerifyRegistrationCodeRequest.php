<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function PHPUnit\Framework\matches;

class
VerifyRegistrationCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return match( $this->route()->getName() ){
            'auth.verify.sign_up' => [
                'name'     => 'required|min:3|max:30',
                'mobile'   => 'required|digits:11|regex:/^09[0-9]{9}$/',
                'password' => 'required|min:8|max:30',
                'email'    => 'email|unique:users,email',
                'code'     => 'required|min:5'
            ],
            'auth.verify.sign_in_by_code' => [
                'mobile'   => 'required|digits:11|regex:/^09[0-9]{9}$/',
                'code'     => 'min:5'
            ],
            'auth.verify.sign_in_by_mobile_and_password' => [
                'mobile'   => 'required|digits:11|regex:/^09[0-9]{9}$/',
                'password' => 'required|min:8'
            ],
            'auth.verify.sign_in_by_email_and_password' => [
                'email'    => 'required|email',
                'password' => 'required|min:8'
            ]
        };
    }

    public static function message()
    {
        return [
            'mobile.regex'    => 'شماره موبایل صحیح نمیباشد.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


}
