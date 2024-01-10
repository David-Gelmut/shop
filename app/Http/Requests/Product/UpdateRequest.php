<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required',
            'desc'=>'required',
            'content'=>'required',
            'prev_image'=>'nullable|file',
            'count'=>'required',
            'price'=>'required',
            'is_published'=>'nullable',
            'category_id'=>'nullable',
            'colors'=>'nullable|array',
            'tags'=>'nullable|array',
        ];
    }
}
