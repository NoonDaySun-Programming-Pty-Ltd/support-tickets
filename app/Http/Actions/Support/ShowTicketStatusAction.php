<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketStatusService;
use App\Http\Requests\ShowTicketStatusRequest;
use Illuminate\Contracts\View\View;

final readonly class ShowTicketStatusAction
{
    public function __construct(
        private TicketStatusService $ticketStatusService,
        private ShowTicketStatusResponder $responder,
    ) {}

    public function __invoke(ShowTicketStatusRequest $request): View
    {
        $data = $request->validated();

        return $this->responder->respond($this->ticketStatusService->get(ticketStatusId: $data['ticket_status_id']));
    }
}
