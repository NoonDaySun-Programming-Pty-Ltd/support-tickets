<?php

declare(strict_types=1);

use App\Enums\Priorities;
use App\Models\Ticket;
use App\Models\TicketStatus;

test(description: 'we can view the ticket page', closure: function (): void {
    loginUser();

    $this->get(uri: route(name: 'dashboard'))
        ->assertOk()
        ->assertSee(value: 'Tickets');
});

test(description: 'we can view a ticket page', closure: function (): void {
    loginUser();
    $ticket = Ticket::query()->create([
        'title' => 'Test',
        'description' => 'testing',
        'priority' => Priorities::High->value,
        'status_id' => TicketStatus::query()->inRandomOrder()->first()->id,
        'created_by' => auth()->id(),
    ]);

    $this->get(uri: route(name: 'tickets.show', parameters: ['id' => $ticket->id]))
        ->assertOk()
        ->assertSee(value: 'Ticket');
});
