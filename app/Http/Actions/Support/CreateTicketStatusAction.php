<?php

declare(strict_types=1);

namespace App\Http\Actions\Support;

use App\Domain\Support\Services\TicketStatusService;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Responders\Support\CreateTicketStatusResponder;
use Illuminate\Http\RedirectResponse;

final readonly class CreateTicketStatusAction
{
    public function __construct(
        private TicketStatusService $ticketStatusCreator,
        private CreateTicketStatusResponder $responder,
    ) {}

    public function __invoke(CreateTicketRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $ticketStatusId = $this->ticketStatusCreator->create(
            title: $data['title'],
            description: $data['description'],
        );

        return $this->responder->respond($ticketStatusId);
    }
}
