<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enums\Priorities;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'ticket_id' => ['required', 'exists:tickets,id'],
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

    public function all(mixed $keys = null): array
    {
        $data = parent::all();
        $data['ticket_id'] = $this->route('ticket_id');

        return $data;
    }
}
