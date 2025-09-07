<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

final class ListTicketStatusResponder
{
    public function respond(LengthAwarePaginator $paginatedData): View
    {
        return view(view: 'ticket-statuses.list', data: ['ticket-status' => $paginatedData]);
    }
}
