<?php

declare(strict_types=1);

namespace App\Http\Responders\Support;

use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

final class ListTicketResponder
{
    public function respond(LengthAwarePaginator $paginatedData): View
    {
        return view(view: 'tickets.list', data: ['tickets' => $paginatedData]);
    }
}
