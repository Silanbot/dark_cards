<?php

namespace App\Broadcasters;

use App\Contracts\WebsocketContract;

class WebsocketBroadcaster
{
    public function __construct(
        protected WebsocketContract $websocket
    ) {
    }
}
