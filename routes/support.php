<?php

declare(strict_types=1);

use App\Http\Actions\Support\CreateTicketAction;
use App\Http\Actions\Support\DeleteTicketAction;
use App\Http\Actions\Support\ListTicketAction;
use App\Http\Actions\Support\ShowTicketAction;
use App\Http\Actions\Support\UpdateTicketAction;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('tickets', ListTicketAction::class)->name('tickets.list');
    Route::post('tickets', CreateTicketAction::class)->name('tickets.create');
    Route::delete('tickets/{ticket-id}', DeleteTicketAction::class)->name('tickets.delete');
    Route::get('tickets/{ticket-id}', ShowTicketAction::class)->name('tickets.show');
    Route::put('tickets/{ticket-id}', UpdateTicketAction::class)->name('tickets.update');

    Route::get('ticket-statuses', ListTicketAction::class)->name('ticket-status.list');
    Route::post('ticket-statuses', CreateTicketAction::class)->name('ticket-status.create');
    Route::delete('ticket-statuses/{ticket-id}', DeleteTicketAction::class)->name('ticket-status.delete');
    Route::put('ticket-statuses/{ticket-id}', UpdateTicketAction::class)->name('ticket-status.update');
});
