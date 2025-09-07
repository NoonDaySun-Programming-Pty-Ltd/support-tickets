<?php

declare(strict_types=1);

namespace App\Infrastructure\Support\Persistence;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketRepository implements TicketRepositoryInterface
{
    public function get(int $ticketId): Ticket
    {
        return Ticket::query()->findOrFail($ticketId);
    }

    public function list(Request $request): LengthAwarePaginator
    {
        $query = Ticket::query();

        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->has('priority')) {
            $query->where('priority', $request->input('priority'));
        }

        if ($request->has('assigned_to')) {
            $query->where('assigned_to', $request->input('assigned_to'));
        }

        return $query->paginate(config(key: 'app.pagination_size', default: 15));
    }

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
