<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Http\RedirectResponse;

final class DeleteTicketResponder
{
    public function respond(): RedirectResponse
    {
        return redirect()
            ->route('dashboard')
            ->with('status', 'Ticket deleted successfully.');
    }
}
