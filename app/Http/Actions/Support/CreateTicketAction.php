<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketService;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Responders\Support\CreateTicketResponder;
use Illuminate\Http\RedirectResponse;

final readonly class CreateTicketAction
{
    public function __construct(
        private TicketService $ticketService,
        private CreateTicketResponder $responder,
    ) {}

    public function __invoke(CreateTicketRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $ticketId = $this->ticketService->create(
            title: $data['title'],
            description: $data['description'],
            priority: (int) $data['priority'],
            statusId: (int) $data['status_id'],
            assigneeId: (int) $data['assignee_id'],
        );

        return $this->responder->respond($ticketId);
    }
}
