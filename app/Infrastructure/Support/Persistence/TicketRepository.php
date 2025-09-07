<?php

declare(strict_types=1);

namespace App\Infrastructure\Support\Persistence;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Models\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    public function remove(int $ticketId): void
    {
        Ticket::query()->where('id', $ticketId)->delete();
    }

    public function store(array $data): int
    {
        $ticket = Ticket::query()->create($data);

        return $ticket->id;
    }

    public function update(int $ticketId, array $data): int
    {
        Ticket::query()->where('id', $ticketId)->update($data);

        return $ticketId;
    }
}
