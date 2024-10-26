<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    //

    protected $fillable = [
        'title',
        'body',
        'creator_id',
        'performer_id',
        'task_status_id'
    ];

    public function task_status(): BelongsTo
    {
        return $this->belongsTo(TaskStatus::class);
    }

    public function performer(): BelongsTo
    {
        return $this->belongsTo(User::class, "performer_id", "id");
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }



}
