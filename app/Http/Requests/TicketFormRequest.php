<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketFormRequest extends FormRequest
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

            //title phai duoc dien it nhat 3 ky tu, va content phai la 10 ky tu
            'title' => 'required|min:3',
            'content' => 'required|min:10',
        ];
    }
}
