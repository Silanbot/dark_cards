<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $bank
 * @property int $game_type
 * @property int $max_gamers
 * @property Collection $deck
 * @property Collection $ready_state
 * @property Collection $join_state
 * @property Collection $mode
 * @property string $password
 * @property int $attacker_player_index
 * @property int $opponent_player_index
 * @property Collection $beats
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
        'opponent_player_index',
        'beats',
    ];

    protected $with = ['settings'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function settings(): BelongsToMany
    {
        return $this->belongsToMany(Setting::class);
    }

    public function casts(): array
    {
        return [
            'deck' => AsCollection::class,
            'ready_state' => AsCollection::class,
            'join_state' => AsCollection::class,
            'mode' => AsCollection::class,
            'beats' => AsCollection::class,
        ];
    }
}
