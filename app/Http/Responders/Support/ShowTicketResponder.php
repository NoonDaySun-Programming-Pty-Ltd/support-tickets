<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;
use App\Domain\Support\Repositories\UserRepositoryInterface;
use App\Enums\Priorities;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class ShowTicketResponder
{
    public function respond(Ticket $ticket, Request $request): View
    {
        $returned = [];
        $priorities = Priorities::cases();

        foreach ($priorities as $priority) {
            $returned[$priority->value] = $priority->name;
        }

        return view(view: 'livewire.tickets.update', data: [
            'ticket' => $ticket,
            'priorities' => $returned,
            'statuses' => app(TicketStatusRepositoryInterface::class)->list($request),
            'users' => app(UserRepositoryInterface::class)->all(),
        ]);
    }
}
