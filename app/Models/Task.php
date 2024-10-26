<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function title(): Attribute
    {
        return Attribute::make(
            get: fn ($item) => ucfirst($item),
        );
    }

    public function body(): Attribute
    {
        return Attribute::make(
            get: fn ($item) => ucfirst($item),
        );
    }




}
