<?php

namespace App\Http\Requests\Project\Application;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationUpdateRequest extends FormRequest {
    public function rules(): array {
        return [
            "body" => ["nullable"],
            "file" => ["nullable", "mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt", "max:5120"]
        ];
    }
}
