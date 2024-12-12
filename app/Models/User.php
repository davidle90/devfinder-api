<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function listings() : HasMany
    {
        return $this->hasMany(Listing::class, 'id', 'owner_id');
    }

    public function applications() : HasMany
    {
        return $this->hasMany(Application::class, 'id', 'applicant_id');
    }

    public function contributions() : HasMany
    {
        return $this->hasMany(Contribution::class, 'id', 'user_id');
    }

    public function events() : HasMany
    {
        return $this->hasMany(Event::class, 'id', 'owner_id');
    }

    public function projects() : HasMany
    {
        return $this->hasMany(Project::class, 'id', 'owner_id');
    }
}
