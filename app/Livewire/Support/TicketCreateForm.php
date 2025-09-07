<?php

declare(strict_types=1);

namespace App\Livewire\Support;

use App\Domain\Support\Services\TicketCreator;
use App\Enums\Priorities;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class TicketCreateForm extends Component
{
    public string $title = '';

    public string $description = '';

    public int $priority;

    public int $status_id;

    public ?int $assignee_id = null;

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

    public function submit(TicketCreator $creator): void
    {
        $this->validate();

        $id = $creator->create(
            $this->title,
            $this->description,
            $this->priority,
            $this->status_id,
            $this->assignee_id,
        );

        $this->redirectRoute('tickets.show', $id);
    }

    public function render(): Factory|View
    {
        return view(view: 'livewire.support.ticket-create-form');
    }
}
