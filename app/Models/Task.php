<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[UseFactory(TaskFactory::class)]
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'completed',
    ];

    protected $casts = [
        'completed' => 'boolean',
    ];

    public function scopeCompleted(Builder $query)
    {
        return $query->where('completed', true);
    }

    public function scopeSearchByTitle(Builder $query, string $title)
    {
        return $query->where('title', 'ilike', '%' . $title . '%');
    }

    public function scopeIncomplete(Builder $query)
    {
        return $query->where('completed', false);
    }

}
