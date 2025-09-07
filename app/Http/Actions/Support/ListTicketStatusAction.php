<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketStatusService;
use App\Http\Responders\Support\ListTicketStatusResponder;
use Illuminate\Http\Request;

final readonly class ListTicketStatusAction
{
    public function __construct(
        private TicketStatusService $ticketStatusService,
        private ListTicketStatusResponder $responder,
    ) {}

    public function __invoke(Request $request): \Illuminate\Contracts\View\View
    {
        return $this->responder->respond($this->ticketStatusService->list($request));
    }
}
