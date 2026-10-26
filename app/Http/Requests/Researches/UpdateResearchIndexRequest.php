<?php

namespace App\Http\Requests\Researches;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResearchIndexRequest extends FormRequest
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
            "subject" => 'required',
            "title" => 'required',
            "researcher" => 'required',
            "number" => 'required',
        ];
    }

    public function messages()
    {
        return [
            "subject.required" => 'الموضوع مطلوب',
            "title.required" => 'عنوان البحث مطلوب',
            "researcher.required" => 'إسم الباحث مطلوب',
            "number.required" => 'العدد مطلوب',
        ];
    }
}

