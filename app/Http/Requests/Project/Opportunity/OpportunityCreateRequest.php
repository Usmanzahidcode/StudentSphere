<?php

namespace App\Http\Requests\Project\Opportunity;

use Illuminate\Foundation\Http\FormRequest;

class OpportunityCreateRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'category' => ['required', 'string', 'max:255'],
            'file' => [
                'nullable',
                'file',
                'mimes:docx,pdf,jpg,png,csv',
                'max:5120'
            ]
        ];
    }
}
