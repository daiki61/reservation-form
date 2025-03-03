<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'reservationDate' => 'required|date',
            'reservationTime' => 'required',
            'reservationNum' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'reservationDate.required' => '予約日を選択してください',
            'reservationTime.required' => '予約時間を選択してください',
            'reservationNum.required' => '予約人数を選択してください',
            'reservation.min:1' => '1人以上で選択してください',

        ];
    }

   
}
