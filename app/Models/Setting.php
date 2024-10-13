<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $icon
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon'
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class);
    }
}
