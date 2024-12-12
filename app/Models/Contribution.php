<?php

namespace App\Models;

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

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
