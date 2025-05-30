<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "title"=>"required|min:3|max:33",
            "body"=>"required|min:3",
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
      
            
        ];
    }
    public function messages(): array
    {
        return [
            "title.unique"=>'please change title',
            "body.min"=>"post body is short :( "
        ];
    }
}
