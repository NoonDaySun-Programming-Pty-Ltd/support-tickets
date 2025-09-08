<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'ticket_id' => ['required', 'exists:tickets,id'],
        ];
    }

    public function all(mixed $keys = null): array
    {
        $data = parent::all();
        $data['ticket_id'] = $this->route('id');

        return $data;
    }
}
