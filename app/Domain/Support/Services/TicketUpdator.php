<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketRepositoryInterface;

final readonly class TicketUpdator
{
    public function __construct(
        private TicketRepositoryInterface $ticketRepository,
    ) {}

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
