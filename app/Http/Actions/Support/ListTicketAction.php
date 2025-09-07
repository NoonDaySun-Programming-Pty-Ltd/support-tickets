<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketService;
use App\Http\Responders\Support\ListTicketResponder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final readonly class ListTicketAction
{
    public function __construct(
        private TicketService $ticketService,
        private ListTicketResponder $responder,
    ) {}

    public function __invoke(Request $request): View
    {
        return $this->responder->respond($this->ticketService->list($request));
    }
}
