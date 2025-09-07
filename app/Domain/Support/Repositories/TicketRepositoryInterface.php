<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

interface TicketRepositoryInterface
{
    public function remove(int $ticketId): void;

    public function store(array $data): int;

    public function update(int $ticketId, array $data): int;
}
