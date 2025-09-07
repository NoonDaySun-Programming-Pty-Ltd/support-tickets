<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;

final readonly class TicketStatusDeletor
{
    public function __construct(
        private TicketStatusRepositoryInterface $ticketStatusRepository,
    ) {}

    public function remove(int $ticketStatusId): void
    {
        $this->ticketStatusRepository->remove(ticketStatusId: $ticketStatusId);
    }
}
