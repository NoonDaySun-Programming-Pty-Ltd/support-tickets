<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function findById(int $id): User;

    public function all(): Collection;

    public function store(array $data): int;
}
