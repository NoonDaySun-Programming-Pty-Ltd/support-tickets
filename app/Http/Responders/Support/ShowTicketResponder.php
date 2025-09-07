<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;

final class ShowTicketResponder
{
    public function respond(Ticket $ticket): View
    {
        return view(view: 'tickets.show', data: ['ticket' => $ticket]);
    }
}
