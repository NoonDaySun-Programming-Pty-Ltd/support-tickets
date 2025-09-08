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
            ticketId: (int) $data['ticket_id'],
            title: $data['title'],
            description: $data['description'],
            priority: (int) $data['priority'],
            statusId: (int) $data['status_id'],
            assigneeId: (int) $data['assignee_id'],
        );

        return $this->responder->respond($data['ticket_id']);
    }
}
