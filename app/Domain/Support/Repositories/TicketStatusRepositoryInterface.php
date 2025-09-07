<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use App\Models\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface TicketStatusRepositoryInterface
{
    public function get(int $ticketStatusId): TicketStatus;

    public function list(Request $request): LengthAwarePaginator;

    public function remove(int $ticketStatusId): void;

    public function store(array $data): int;

    public function update(int $ticketId, array $data): int;
}
