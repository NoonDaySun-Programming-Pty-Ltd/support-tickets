<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketStatusService;
use App\Http\Requests\UpdateTicketStatusRequest;
use App\Http\Responders\Support\UpdateTicketStatusResponder;
use Illuminate\Http\RedirectResponse;

final readonly class UpdateTicketStatusAction
{
    public function __construct(
        private TicketStatusService $ticketStatusService,
        private UpdateTicketStatusResponder $responder,
    ) {}

    public function __invoke(UpdateTicketStatusRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->ticketStatusService->update(
            ticketId: $data['ticket_id'],
            title: $data['title'],
            description: $data['description'],
        );

        return $this->responder->respond($data['ticket_status_id']);
    }
}
