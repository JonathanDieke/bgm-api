<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDailyDataRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nb_hypoglycemia' => ["required", "integer", 'min:0', 'max:500'],
            'nb_hyperglycemia' => ["required", "integer", 'min:0', 'max:500'],
            'is_sick' => ["required", "boolean"],
            'user_id' => ["required", "uuid"],
        ];
    }
}
