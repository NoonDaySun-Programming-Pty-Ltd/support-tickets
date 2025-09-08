<?php

declare(strict_types=1);

namespace App\Livewire\Support;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use Illuminate\Http\Request;
use Livewire\Component;

class ListTickets extends Component
{
    public function render(Request $request)
    {
        return view(view: 'livewire.tickets.list', data: [
            'tickets' => app(TicketRepositoryInterface::class)->list($request),
        ]);
    }
}
