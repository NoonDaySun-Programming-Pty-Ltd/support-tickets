<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketRepositoryInterface;

final class TicketCreator
{
    public function __construct(
        private readonly TicketRepositoryInterface $ticketRepository,
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
}
