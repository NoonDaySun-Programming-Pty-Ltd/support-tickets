<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Priorities;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'priority' => [
                'required',
                Rule::in(Priorities::cases()),
            ],
            'status_id' => ['required', 'exists:ticket_statuses,id'],
            'assignee_id' => ['nullable', 'exists:users,id'],
        ];
    }
}
