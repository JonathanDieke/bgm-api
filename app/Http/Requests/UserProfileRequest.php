<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            "birthdate" => ['nullable', 'date', 'before:'. now()->subYears(10)],
            "ethnic" => ['nullable', 'string' ],
            "gender" => ['nullable', 'in:male,female'],
            "is_alcoholic" => ['nullable', 'boolean'],
            "is_smoker"  => ['nullable',  'boolean'],
            "weight"  => ['nullable', 'numeric'],
            "height"  => ['nullable', 'numeric'],
            "is_tense"  => ['nullable',  'boolean'],
            "diabetes_type"  => ['nullable', 'in:type1,type2,type3'],
            "discover_date"  => ['nullable', 'date', 'before_or_equal:'.now() ],
            "start_treatment_date"  => ['nullable',  'before_or_equal:'.now() ],
            "treatment_type"  => ['nullable', 'string'],
            "physic_activities"  => ['nullable', ],
            "pregnancies"  => ['nullable', 'integer'],
            "job"  => ['nullable', 'string'],
            "user_id"  => ['nullable','uuid'],
        ];
    }
}
