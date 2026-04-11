<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $user = $this->user;
        return [
            //

            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'min:3',
                'max:255',
                Rule::unique('users')->ignore($user),
                Rule::email()
            ],
            'cv' => ['nullable', 'string', 'min:10', 'max:65535'],
            'cv_en' => ['nullable', 'string', 'min:10', 'max:65535'],
            'phone' => ['nullable', 'string', 'min:3', 'max:255'],
            'address' => ['nullable', 'string', 'min:3', 'max:255'],
            'facebook' => ['nullable', 'string', 'url', 'min:3', 'max:255'],
            'instagram' => ['nullable', 'string', 'url', 'min:3', 'max:255'],
            'youtube' => ['nullable', 'string', 'url', 'min:3', 'max:255'],
        ];
    }
}
