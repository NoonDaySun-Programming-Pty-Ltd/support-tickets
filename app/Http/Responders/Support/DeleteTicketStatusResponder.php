<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Http\RedirectResponse;

final class DeleteTicketStatusResponder
{
    public function respond(): RedirectResponse
    {
        return redirect()
            ->route('home')
            ->with('status', 'Ticket Status deleted successfully.');
    }
}
