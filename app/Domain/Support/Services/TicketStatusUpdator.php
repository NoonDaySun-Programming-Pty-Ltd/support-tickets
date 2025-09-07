<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;

final readonly class TicketStatusUpdator
{
    public function __construct(
        private TicketStatusRepositoryInterface $ticketStatusRepository,
    ) {}

    public function update(
        int $ticketId,
        string $title,
        string $description,
    ): int {
        $loggedInUser = auth()->id();

        return $this->ticketStatusRepository->update(ticketId: $ticketId, data: [
            'title' => $title,
            'description' => $description,
            'updated_by' => $loggedInUser,
        ]);
    }
}
