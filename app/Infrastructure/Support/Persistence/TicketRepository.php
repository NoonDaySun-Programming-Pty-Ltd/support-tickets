<?php

declare(strict_types=1);

namespace App\Infrastructure\Support\Persistence;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function store(array $data): int
    {
        $ticket = Ticket::query()->create($data);

        return $ticket->id;
    }
}
