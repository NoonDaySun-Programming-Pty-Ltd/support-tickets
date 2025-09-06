<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findById(int $id): User;

    public function store(array $data): int;
}
