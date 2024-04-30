<?php

return [
    'api_key' => env('CENTRIFUGO_API_KEY'),
    'token_hmac_secret' => env('CENTRIFUGO_TOKEN_HMAC_SECRET_KEY'),
    'host' => env('CENTRIFUGO_HOST'),
];
