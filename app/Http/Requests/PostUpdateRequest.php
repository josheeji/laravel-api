<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiErrorResponse;

class PostUpdateRequest extends FormRequest
{
    use ApiErrorResponse;



    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'dob' => 'required|date_format:Y-m-d',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:male,female',
        ];
    }
}
