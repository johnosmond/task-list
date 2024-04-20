<?php

namespace App\Http\Requests;

use App\Rules\TodayOrFutureDate;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
            'due_date' => ['nullable', 'date', new TodayOrFutureDate('Due Date')],
        ];
    }
}
