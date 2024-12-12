<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contribution extends Model
{
    /** @use HasFactory<\Database\Factories\ContributionFactory> */
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'role'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters) {
        return $filters->apply($builder);
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
