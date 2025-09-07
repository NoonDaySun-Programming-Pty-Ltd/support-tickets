<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketRepositoryInterface;

final readonly class TicketDeletor
{
    public function __construct(
        private TicketRepositoryInterface $ticketRepository,
    ) {}

    public function remove(int $ticketId): void
    {
        $this->ticketRepository->remove(ticketId: $ticketId);
    }
}
