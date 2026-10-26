<?php

namespace App\Http\Requests\Researches;

use Illuminate\Foundation\Http\FormRequest;

class ImportResearchIndexRequest extends FormRequest
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
            'excel_file' => 'required|mimes:xlsx,xls,csv|max:10240', // Max 10MB
        ];
    }

    public function messages()
    {
        return [
            'excel_file.required' => 'ملف Excel مطلوب',
            'excel_file.mimes' => 'يجب أن يكون الملف من نوع Excel (xlsx, xls, csv)',
            'excel_file.max' => 'حجم الملف يجب ألا يتجاوز 10 ميجابايت',
        ];
    }
}

