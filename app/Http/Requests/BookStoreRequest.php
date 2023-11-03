<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //! true yaptık. Herkese açık oldu sanırım.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'price' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'price.required' => 'A price is required',
        ];
    }
}
