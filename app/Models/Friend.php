<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'recipient_id',
    ];

    public function sender(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users', 'sender_id');
    }

    public function recipient(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users', 'recipient_id');
    }
}
