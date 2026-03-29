<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateProjectRequest extends FormRequest
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

            'position' => ['required', 'integer', 'min:1', 'max:1000000000'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'title_en' => ['nullable', 'string', 'min:3', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'category_id' => ['required', 'integer'],
            'original' => ['nullable', File::image()->min($min)->max($max)]
        ];
    }
}
