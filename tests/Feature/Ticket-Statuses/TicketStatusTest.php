<?php

declare(strict_types=1);

use App\Models\TicketStatus;

test(description: 'we can view the ticket statuses page', closure: function (): void {
    loginUser();

    $this->get(uri: route(name: 'ticket-status.list'))
        ->assertOk()
        ->assertSee(value: 'Create New Ticket Status')
        ->assertSee(value: 'ID')
        ->assertSee(value: 'Name')
        ->assertSee(value: 'Description')
        ->assertSee(value: 'Created At')
        ->assertSee(value: 'Updated At')
        ->assertSee(value: 'Actions')
        ->assertSee(value: 'Ticket Statuses List');
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
