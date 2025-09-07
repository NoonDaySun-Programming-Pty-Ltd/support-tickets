<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TicketStatusRepositoryInterface
{
    public function getAll(): Collection;

    public function remove(int $ticketStatusId): void;

    public function store(array $data): int;

    public function update(int $ticketId, array $data): int;
}
