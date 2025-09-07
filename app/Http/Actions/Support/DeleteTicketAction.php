<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketService;
use App\Http\Requests\DeleteTicketRequest;
use App\Http\Responders\Support\DeleteTicketResponder;
use Illuminate\Http\RedirectResponse;

final readonly class DeleteTicketAction
{
    public function __construct(
        private TicketService $ticketService,
        private DeleteTicketResponder $responder,
    ) {}

    public function __invoke(DeleteTicketRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->ticketService->remove(ticketId: $data['ticket_id']);

        return $this->responder->respond();
    }
}
