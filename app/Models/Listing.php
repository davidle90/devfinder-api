<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'listable_id',
        'listable_type',
        'title',
        'description'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    public function listable() : MorphTo
    {
        return $this->morphTo();
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
