<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status_id',
        'created_by',
        'updated_by',
        'assignee_id',
        'priority',
    ];

    protected function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    protected function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected function status(): BelongsTo
    {
        return $this->belongsTo(TicketStatus::class, 'status_id');
    }

    protected function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
