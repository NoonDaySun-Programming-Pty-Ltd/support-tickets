<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Http\RedirectResponse;

final class CreateTicketResponder
{
    public function respond(int $ticketId): RedirectResponse
    {
        return redirect()
            ->route('tickets.show', ['id' => $ticketId])
            ->with('status', 'Ticket created successfully.');
    }
}
