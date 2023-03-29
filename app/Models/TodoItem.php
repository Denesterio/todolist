<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Todo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tag;

class TodoItem extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'description',
        'todo_id',
    ];

    public function todo(): BelongsToMany
    {
        return $this->belongsToMany(Todo::class, 'todo_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_todo_item', 'todo_item_id', 'tag_id');
    }
}
