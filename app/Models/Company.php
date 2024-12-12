<?php

namespace App\Models;

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

    public function listings() : MorphMany
    {
        return $this->morphMany(Listing::class, 'listable');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
