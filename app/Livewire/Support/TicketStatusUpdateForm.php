<?php

declare(strict_types=1);

namespace App\Livewire\Support;

use App\Domain\Support\Services\TicketStatusService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TicketStatusUpdateForm extends Component
{
    public int $ticketStatusId = 0;

    public string $title = '';

    public string $description = '';

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function submit(TicketStatusService $updator): void
    {
        $this->validate();

        $id = $updator->update(
            $this->ticketStatusId,
            $this->title,
            $this->description,
        );

        $this->redirectRoute('ticket-status.list', $id);
    }

    public function render(): Factory|View
    {
        return view(view: 'livewire.support.ticket-update-form');
    }
}
