<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

interface TicketRepositoryInterface
{
    public function store(array $data): int;
}
