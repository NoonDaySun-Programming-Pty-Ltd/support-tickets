<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketService;
use App\Http\Requests\ShowTicketRequest;
use App\Http\Responders\Support\ShowTicketResponder;
use Illuminate\Contracts\View\View;

final readonly class ShowTicketAction
{
    public function __construct(
        private TicketService $ticketService,
        private ShowTicketResponder $responder,
    ) {}

    public function __invoke(ShowTicketRequest $request): View
    {
        $data = $request->validated();

        return $this->responder->respond($this->ticketService->get(ticketId: $data['ticket_id']), $request);
    }
}
