<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\TodoItem;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'type',
    ];

    const PUBLIC_TYPE = 1;
    const PRIVATE_TYPE = 2;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(TodoItem::class, 'todo_id');
    }

    public function getIsPublicAttribute(): bool
    {
        return $this->type === self::PUBLIC_TYPE;
    }

    public function getIsPrivateAttribute(): bool
    {
        return $this->type === self::PRIVATE_TYPE;
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->whereType(self::PUBLIC_TYPE);
    }
}
