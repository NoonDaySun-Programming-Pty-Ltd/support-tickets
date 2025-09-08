<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowTicketStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'ticket_status_id' => ['required', 'exists:ticket_statuses,id'],
        ];
    }

    public function all(mixed $keys = null): array
    {
        $data = parent::all();
        $data['ticket_status_id'] = (int) $this->route('id');

        return $data;
    }
}
