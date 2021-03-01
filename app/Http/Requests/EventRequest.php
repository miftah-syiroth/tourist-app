<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required|string',
            'recreation' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'price' => 'required|alpha_num|gt:1000',
            'description' => 'required',
            'image' => 'image',
        ];
    }
}
