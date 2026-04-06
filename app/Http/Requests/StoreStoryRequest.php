<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreStoryRequest extends FormRequest
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
            'intro' => ['required', 'string', 'min:3', 'max:65535'],
            'intro_en' => ['required', 'string', 'min:3', 'max:65535'],
            'body' => ['required', 'string', 'min:3', 'max:65535'],
            'body_en' => ['required', 'string', 'min:3', 'max:65535'],
            'tags' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'tags_en' => ['required', 'string', 'min:3', 'max:255', 'regex:/^[\p{L}\d\-]+(?: [\p{L}\d\-]+)*(, [\p{L}\d\-]+(?: [\p{L}\d\-]+)*){0,19}$/u'],
            'original' => ['required', File::image()->min($min)->max($max)]
        ];
    }
}
