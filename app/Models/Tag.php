<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\TodoItem;

class Tag extends Model
{
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'name',
    ];

    public function todo_items(): BelongsToMany
    {
        return $this->belongsToMany(TodoItem::class, 'tag_todo_item', 'tag_id', 'todo_item_id');
    }
}
