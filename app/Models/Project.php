<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'repository_url'
    ];

    protected $casts = [
        'start_datetime' => 'datetime',
        'end_datetime' => 'datetime'
    ];

    public function listings() : MorphMany
    {
        return $this->morphMany(Listing::class, 'listable');
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function contributions() : HasMany
    {
        return $this->hasMany(Contribution::class, 'id', 'project_id');
    }
}
