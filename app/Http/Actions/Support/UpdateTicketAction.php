<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketService;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Responders\Support\UpdateTicketResponder;
use Illuminate\Http\RedirectResponse;

final readonly class UpdateTicketAction
{
    public function __construct(
        private TicketService $ticketService,
        private UpdateTicketResponder $responder,
    ) {}

    public function __invoke(UpdateTicketRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->ticketService->update(
            ticketId: $data['ticket_id'],
            title: $data['title'],
            description: $data['description'],
            priority: $data['priority'],
            statusId: $data['status_id'],
            assigneeId: $data['assignee_id'] ?? null,
        );

        return $this->responder->respond($data['ticket_id']);
    }
}
