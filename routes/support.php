<?php

declare(strict_types=1);

use App\Http\Actions\Support\CreateTicketAction;
use App\Http\Actions\Support\CreateTicketStatusAction;
use App\Http\Actions\Support\DeleteTicketAction;
use App\Http\Actions\Support\DeleteTicketStatusAction;
use App\Http\Actions\Support\ListTicketAction;
use App\Http\Actions\Support\ListTicketStatusAction;
use App\Http\Actions\Support\ShowTicketAction;
use App\Http\Actions\Support\ShowTicketStatusAction;
use App\Http\Actions\Support\UpdateTicketAction;
use App\Http\Actions\Support\UpdateTicketStatusAction;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('tickets', ListTicketAction::class)->name('tickets.list');
    Route::post('tickets', CreateTicketAction::class)->name('tickets.create');
    Route::delete('tickets/{id}', DeleteTicketAction::class)->name('tickets.delete');
    Route::get('tickets/{id}', ShowTicketAction::class)->name('tickets.show');
    Route::post('tickets/{id}', UpdateTicketAction::class)->name('tickets.update');

    Route::get('ticket-statuses', ListTicketStatusAction::class)->name('ticket-status.list');
    Route::get('ticket-statuses/{id}', ShowTicketStatusAction::class)->name('ticket-status.show');
    Route::post('ticket-statuses', CreateTicketStatusAction::class)->name('ticket-status.create');
    Route::delete('ticket-statuses/{id}', DeleteTicketStatusAction::class)->name('ticket-status.delete');
    Route::post('ticket-statuses/{id}', UpdateTicketStatusAction::class)->name('ticket-status.update');
});
