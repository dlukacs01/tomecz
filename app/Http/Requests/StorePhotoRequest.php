<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StorePhotoRequest extends FormRequest
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
        $min = config('custom.validations.filesize.calculation.min', 1);
        $max = config('custom.validations.filesize.calculation.max', 30720);
        return [
            //

            'title' => ['required', 'string', 'min:3', 'max:255'],
            'title_en' => ['nullable', 'string', 'min:3', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'size' => ['required', 'string', 'min:3', 'max:255'],
            'technique' => ['required', 'string', 'min:3', 'max:255'],
            'technique_en' => ['nullable', 'string', 'min:3', 'max:255'],
            'tags' => ['nullable', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'tags_en' => ['nullable', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'body' => ['nullable', 'string', 'min:3', 'max:65535'],
            'body_en' => ['nullable', 'string', 'min:3', 'max:65535'],
            'project_id' => ['required', 'integer'],
            'original' => ['required', File::image()->min($min)->max($max)]
        ];
    }
}
