<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" => ["nullable", "uuid"],
            "type" => ["required", "string", "in:first_breakfast,breakfast,dinner"],
            "hour" => ["required", "integer", "between:0,23"],
            "glycemia_before" => ["required", "numeric"],
            "glycemia_after" => ["required", "numeric"],
            "content" => ["required", "string"],
            // "daily_data_id" => ["required", "uuid"],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
    */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
