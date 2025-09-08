<?php

declare(strict_types=1);

use App\Models\TicketStatus;

test(description: 'we can view the ticket statuses page', closure: function (): void {
    loginUser();

    $this->get(uri: route(name: 'ticket-status.list'))
        ->assertOk()
        ->assertSee(value: 'Ticket Statuses');
});

test(description: 'we can view a ticket status page', closure: function (): void {
    loginUser();
    $ticket = TicketStatus::query()->create([
        'name' => 'Test Status',
        'description' => 'testing',
    ]);

    $this->get(uri: route(name: 'ticket-status.show', parameters: ['id' => $ticket->id]))
        ->assertOk()
        ->assertSee(value: 'Ticket Status');
});
