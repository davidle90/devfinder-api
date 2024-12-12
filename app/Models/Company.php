<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'website',
        'logo'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    public function listings() : MorphMany
    {
        return $this->morphMany(Listing::class, 'listable');
    }

    public function owner() : BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
