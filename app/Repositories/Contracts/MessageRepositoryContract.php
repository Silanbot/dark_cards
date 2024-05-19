<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface MessageRepositoryContract
{
    public function messages(int $room): Collection;
}
