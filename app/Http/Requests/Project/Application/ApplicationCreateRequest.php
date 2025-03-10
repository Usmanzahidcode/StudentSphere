<?php

namespace App\Http\Requests\Project\Application;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "body" => ["required"],
            "file" => ["nullable", "mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt", "max:5120"]
        ];
    }
}
