<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Http\RedirectResponse;

final class UpdateTicketResponder
{
    public function respond(int $ticketId): RedirectResponse
    {
        return redirect()
            ->route('tickets.show', ['id' => $ticketId])
            ->with('status', 'Ticket updated successfully.');
    }
}
