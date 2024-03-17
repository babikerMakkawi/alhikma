<?php

namespace App\Http\Requests\Researches;

use Illuminate\Foundation\Http\FormRequest;

class StoreResearchRequest extends FormRequest
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
            "title" => 'required|unique:researches,title',
            "researcher" => 'required',
            "number_of_pages" => 'required',
            "date" => 'required',
        ];
    }

    public function messages()
    {
        return [

            "title.required" => 'عنوان البحث مطلوب',
            "title.unique" => 'عنوان البحث موجود مسبقا',
            "researcher.required" => 'إسم الباحث مطلوب',
            "number_of_pages.required" => 'عدد الصفحات مطلوب',
            "date.required" => 'تاريخ النشر مطلوب',

        ];
    }
}
