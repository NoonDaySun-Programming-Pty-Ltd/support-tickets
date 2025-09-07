<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketStatusService;
use App\Http\Requests\DeleteTicketStatusRequest;
use App\Http\Responders\Support\DeleteTicketResponder;
use Illuminate\Http\RedirectResponse;

final readonly class DeleteTicketStatusAction
{
    public function __construct(
        private TicketStatusService $ticketStatusService,
        private DeleteTicketResponder $responder,
    ) {}

    public function __invoke(DeleteTicketStatusRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->ticketStatusService->remove(ticketStatusId: $data['ticket_status_id']);

        return $this->responder->respond();
    }
}
