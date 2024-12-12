<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'applicant_id',
        'message',
        'status'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    public function listing() : BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }
}
