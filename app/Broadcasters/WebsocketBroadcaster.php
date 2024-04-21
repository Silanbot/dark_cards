<?php

namespace App\Broadcasters;

use App\Contracts\WebsocketContract;
use Illuminate\Http\Request;

class WebsocketBroadcaster
{
    public function __construct(
        protected WebsocketContract $websocket
    ) {}
}
