<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:191',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '名前を入力してください',
            'username.string' => '名前を文字列で入力してください',
            'username.max' => '名前を191字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => '有効なメールアドレス形式で入力してください',
            'email.unique' => 'すでに存在しているメールアドレスです',
            'email.max' => 'メールアドレスを191字以内で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードを8字以上で入力してください',
            'password.max' => 'パスワードを191字以内で入力してください',
        ];
    }

   
}
