<?php

namespace App\Http\Requests\courses;

use Illuminate\Foundation\Http\FormRequest;

class CourseVideoRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'videos.*' => 'required|file|mimes:mp4,mov,avi,wmv|max:10240',
        ];
    }
}
