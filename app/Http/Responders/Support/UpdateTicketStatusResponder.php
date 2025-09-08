<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Http\RedirectResponse;

final class UpdateTicketStatusResponder
{
    public function respond(): RedirectResponse
    {
        return redirect()
            ->route('ticket-statuses.list')
            ->with('status', 'Ticket Status updated successfully.');
    }
}
