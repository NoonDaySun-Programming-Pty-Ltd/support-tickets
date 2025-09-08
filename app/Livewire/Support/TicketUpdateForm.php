<?php

declare(strict_types=1);

namespace App\Livewire\Support;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Domain\Support\Services\TicketService;
use App\Enums\Priorities;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class TicketUpdateForm extends Component
{
    public int $ticketId = 0;

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

    public function submit(TicketService $updator): void
    {
        $this->validate();

        $id = $updator->update(
            $this->ticketId,
            $this->title,
            $this->description,
            $this->priority,
            $this->status_id,
            $this->assignee_id,
        );

        $this->redirectRoute('tickets.show', $id);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function render(): Factory|View
    {
        return view(view: 'livewire.tickets.update', data: ['ticket' => app(TicketRepositoryInterface::class)->get($this->ticketId)]);
    }
}
