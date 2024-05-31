<?php

namespace App\Services;

use App\Contracts\WebsocketContract;
use phpcent\Client;

final readonly class WebsocketService implements WebsocketContract
{
    public function __construct(
        private Client $centrifuge
    ) {
    }

    public function publish(string $channel, array $data): void
    {
        $this->centrifuge->publish($channel, $data);
    }

    public function broadcast(array $channels, array $data): void
    {
        $this->centrifuge->broadcast($channels, $data);
    }
}
