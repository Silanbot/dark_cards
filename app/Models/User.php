<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Multicaret\Acquaintances\Traits\Friendable;

/**
 * @property int $id
 * @property string $username
 * @property float $balance
 */
class User extends Authenticatable
{
    use Friendable, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'coins',
        'cash',
        'id',
    ];

    public function achievements(): BelongsToMany
    {
        return $this->belongsToMany(Achievement::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
