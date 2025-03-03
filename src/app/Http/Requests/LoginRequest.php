<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|min:8|max:191',
        ];
    }

    public function messages()
    {
        return [
            
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式で入力してください',
            'email.exists' => '存在しないメールアドレスです',
            'email.max' => 'メールアドレスを191字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードを8字以上で入力してください',
            'password.max' => 'パスワードを191字以内で入力してください',
        ];
    }

   
}