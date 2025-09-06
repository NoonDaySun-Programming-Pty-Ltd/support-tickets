<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|TicketStatus newModelQuery()
 * @method static Builder<static>|TicketStatus newQuery()
 * @method static Builder<static>|TicketStatus query()
 * @method static Builder<static>|TicketStatus whereCreatedAt($value)
 * @method static Builder<static>|TicketStatus whereCreatedBy($value)
 * @method static Builder<static>|TicketStatus whereDescription($value)
 * @method static Builder<static>|TicketStatus whereId($value)
 * @method static Builder<static>|TicketStatus whereName($value)
 * @method static Builder<static>|TicketStatus whereUpdatedAt($value)
 * @method static Builder<static>|TicketStatus whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class TicketStatus extends Model
{
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'updated_by',
    ];

    protected function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'status_id');
    }

    protected function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
