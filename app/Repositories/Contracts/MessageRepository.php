<?php

namespace App\Repositories\Contracts;

use App\Models\Message;
use Illuminate\Support\Collection;

class MessageRepository implements MessageRepositoryContract
{
    public function messages(int $room): Collection
    {
        return Message::query()->where('room_id', $room)->get();
    }
}
