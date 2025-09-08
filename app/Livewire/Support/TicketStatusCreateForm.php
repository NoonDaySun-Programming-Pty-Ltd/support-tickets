<?php

declare(strict_types=1);

namespace App\Livewire\Support;

use App\Domain\Support\Services\TicketStatusService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TicketStatusCreateForm extends Component
{
    public string $title = '';

    public string $description = '';

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function submit(TicketStatusService $creator): void
    {
        $this->validate();

        $creator->create(
            $this->title,
            $this->description,
        );

        $this->redirectRoute('ticket-status.list');
    }

    public function render(): Factory|View
    {
        return view(view: 'livewire.ticket-statuses.create');
    }
}
