<?php

declare(strict_types=1);

namespace App\Domain\Support\Services;

use App\Domain\Support\Repositories\TicketStatusRepositoryInterface;

final class TicketStatusCreator
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
            'title' => $title,
            'description' => $description,
            'created_by' => $loggedInUser,
            'updated_by' => $loggedInUser,
        ]);
    }
}
