<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreVideoRequest extends FormRequest
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
            'title_en' => ['required', 'string', 'min:3', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'url' => ['required', 'string', 'url', 'min:3', 'max:255'],
            'body' => ['nullable', 'string', 'min:3', 'max:65535'],
            'body_en' => ['nullable', 'string', 'min:3', 'max:65535'],
            'tags' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'tags_en' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'original' => ['required', File::image()->min($min)->max($max)]
        ];
    }
}
