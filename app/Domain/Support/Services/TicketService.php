<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketRepositoryInterface;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

final readonly class TicketService
{
    public function __construct(
        private TicketRepositoryInterface $ticketRepository,
    ) {}

    public function create(
        string $title,
        string $description,
        int $priority,
        int $statusId,
        ?int $assigneeId = null,
    ): int {
        $loggedInUser = auth()->id();

        return $this->ticketRepository->store([
            'title' => $title,
            'description' => $description,
            'priority' => $priority,
            'status_id' => $statusId,
            'assignee_id' => $assigneeId,
            'created_by' => $loggedInUser,
            'updated_by' => $loggedInUser,
        ]);
    }

    public function get(int $ticketId): Ticket
    {
        return $this->ticketRepository->get(ticketId: $ticketId);
    }

    public function list(Request $request): LengthAwarePaginator
    {
        return $this->ticketRepository->list($request);
    }

    public function remove(int $ticketId): void
    {
        $this->ticketRepository->remove(ticketId: $ticketId);
    }

    public function update(
        int $ticketId,
        string $title,
        string $description,
        int $priority,
        int $statusId,
        ?int $assigneeId = null,
    ): int {
        $loggedInUser = auth()->id();

        return $this->ticketRepository->update(ticketId: $ticketId, data: [
            'title' => $title,
            'description' => $description,
            'priority' => $priority,
            'status_id' => $statusId,
            'assignee_id' => $assigneeId,
            'updated_by' => $loggedInUser,
        ]);
    }
}
