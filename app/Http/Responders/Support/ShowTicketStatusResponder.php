<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use App\Models\TicketStatus;
use Illuminate\Contracts\View\View;

final class ShowTicketStatusResponder
{
    public function respond(TicketStatus $ticketStatus): View
    {
        return view(view: 'livewire.ticket-statuses.update', data: ['ticket' => $ticketStatus]);
    }
}
