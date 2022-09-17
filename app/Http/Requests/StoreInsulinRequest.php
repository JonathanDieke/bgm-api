<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsulinRequest extends FormRequest
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
            "id" => ["nullable", "uuid"],
            "type" => ["required", "string", "in:oral,injection"],
            "mark" => ["required", "string"],
            "hour" => ["required", "integer", "min:0", 'max:23'],
            "glycemia" => ["required", "numeric"],
            // "daily_data_id" => ["required", "uuid"],
        ];
    }
}
