<?php

declare(strict_types=1);

namespace App\Infrastructure\Support\Persistence;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;
use App\Models\TicketStatus;
use Illuminate\Database\Eloquent\Collection;

final class TicketStatusRepository implements TicketStatusRepositoryInterface
{
    public function getAll(): Collection
    {
        return TicketStatus::all();
    }

    public function remove(int $ticketStatusId): void
    {
        TicketStatus::query()->where('id', $ticketStatusId)->delete();
    }

    public function store(array $data): int
    {
        $loggedUnUserId = auth()->id();
        $ticketStatus = TicketStatus::query()->create($data + [
            'created_by' => $loggedUnUserId,
            'updated_by' => $loggedUnUserId,
        ]);

        return $ticketStatus->id; // Placeholder return value
    }

    public function update(int $ticketStatusId, array $data): int
    {
        TicketStatus::query()->where('id', $ticketStatusId)->update($data);

        return $ticketStatusId;
    }
}
