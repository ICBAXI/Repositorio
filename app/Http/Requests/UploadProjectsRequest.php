<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'url' => 'required', Rule::unique('projects')->ignore($this->route('project')),
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El Proyecto Necesita un Titulo'
        ];
    }
}