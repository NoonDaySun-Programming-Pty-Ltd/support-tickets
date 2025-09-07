<?php

declare(strict_types=1);

namespace App\Infrastructure\Support\Persistence;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

final class TicketStatusRepository implements TicketStatusRepositoryInterface
{
    public function get(int $ticketStatusId): TicketStatus
    {
        return TicketStatus::query()->findOrFail($ticketStatusId);
    }

    public function list(Request $request): LengthAwarePaginator
    {
        $query = TicketStatus::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }

        return $query->paginate(config(key: 'app.pagination_size', default: 15));
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
