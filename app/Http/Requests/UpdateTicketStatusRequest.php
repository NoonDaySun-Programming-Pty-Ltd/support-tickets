<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'ticket_status_id' => ['required', 'exists:ticket_statuses,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function all(mixed $keys = null): array
    {
        $data = parent::all();
        $data['ticket_status_id'] = (int) $this->route('id');

        return $data;
    }
}
