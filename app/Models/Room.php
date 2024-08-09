<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $bank
 * @property int $game_type
 * @property int $max_gamers
 * @property array $deck
 * @property array $ready_state
 * @property array $join_state
 * @property array $mode
 * @property string $password
 */
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank',
        'game_type',
        'max_gamers',
        'deck',
        'ready_state',
        'join_state',
        'mode',
        'attacker_player_index',
        'opponent_player_index'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function casts(): array
    {
        return [
            'deck' => AsCollection::class,
            'ready_state' => AsCollection::class,
            'join_state' => AsCollection::class,
            'mode' => AsCollection::class,
        ];
    }
}
