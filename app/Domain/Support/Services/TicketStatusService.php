<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;
use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

final class TicketStatusService
{
    public function __construct(
        private readonly TicketStatusRepositoryInterface $ticketStatusRepository,
    ) {}

    public function create(
        string $title,
        string $description,
    ): int {
        $loggedInUser = auth()->id();

        return $this->ticketStatusRepository->store([
            'name' => $title,
            'description' => $description,
            'created_by' => $loggedInUser,
            'updated_by' => $loggedInUser,
        ]);
    }

    public function get(int $ticketStatusId): TicketStatus
    {
        return $this->ticketStatusRepository->get(ticketStatusId: $ticketStatusId);
    }

    public function list(Request $request): LengthAwarePaginator
    {
        return $this->ticketStatusRepository->list($request);
    }

    public function remove(int $ticketStatusId): void
    {
        $this->ticketStatusRepository->remove(ticketStatusId: $ticketStatusId);
    }

    public function update(
        int $ticketStatusId,
        string $title,
        string $description,
    ): int {
        $loggedInUser = auth()->id();

        return $this->ticketStatusRepository->update(ticketStatusId: $ticketStatusId, data: [
            'name' => $title,
            'description' => $description,
            'updated_by' => $loggedInUser,
        ]);
    }
}
