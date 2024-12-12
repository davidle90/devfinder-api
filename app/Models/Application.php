<?php

namespace App\Models;

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

    public function listing() : BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }
}
