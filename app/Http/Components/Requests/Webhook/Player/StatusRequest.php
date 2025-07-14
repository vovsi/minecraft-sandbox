<?php

namespace App\Http\Components\Requests\Webhook\Player;

use App\Http\Enum\Webhook\Player\Status;
use App\Services\Webhook\Player\ParserService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class StatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        if ($this->filled('content')) {
            $this->merge([
                'username' => ParserService::getUsername($this->content),
                'status' => ParserService::getStatus($this->content),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => 'required|string|max:512',
            'username' => 'required|string|max:256',
            'status' => ['required', new Enum(Status::class)],
        ];
    }

    public function status(): Status
    {
        return Status::from($this->input('status'));
    }
}
