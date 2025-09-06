<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface TicketStatusRepositoryInterface
{
    public function store(array $data): int;

    public function getAll(): Collection;
}
