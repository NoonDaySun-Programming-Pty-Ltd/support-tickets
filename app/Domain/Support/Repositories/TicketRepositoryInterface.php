<?php

declare(strict_types=1);

namespace App\Domain\Support\Repositories;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface TicketRepositoryInterface
{
    public function get(int $ticketId): Ticket;

    public function list(Request $request): LengthAwarePaginator;

    public function remove(int $ticketId): void;

    public function store(array $data): int;

    public function update(int $ticketId, array $data): int;
}
