<?php

namespace App\Models;

use App\Enums\GameResultEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
        'user_id',
    ];
}
