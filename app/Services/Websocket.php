<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\WebsocketContract;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Websocket implements WebsocketContract
{
    const API_PATH = '/api';

    public function __construct(
        protected Client $client,
        protected array $config
    ) {
        $this->config = $this->initConfiguration($this->config);
    }

    protected function initConfiguration(array $config): array
    {
        $defaults = [
            'url' => 'http://localhost:8000',
            'token_hmac_secret_key' => null,
            'api_key' => null,
            'ssl_key' => null,
            'verify' => true,
        ];

        foreach ($config as $key => $value) {
            if (array_key_exists($key, $defaults)) {
                $defaults[$key] = $value;
            }
        }

        return $defaults;
    }

    public function publish(string $channel, array $data): array
    {
        return $this->send('publish', [
            'channel' => $channel,
            'data' => $data,
            'skipHistory' => false,
        ]);
    }

    public function broadcast(array $channels, array $data): array
    {
        return $this->send('broadcast', [
            'channels' => $channels,
            'data' => $data,
            'skip_history' => false,
        ]);
    }

    public function presence(string $channel): array
    {
        return $this->send('presence', ['channel' => $channel]);
    }

    public function subscribe(string $channel, string $user): array
    {
        return $this->send('subscribe', [
            'channel' => $channel,
            'user' => $user,
            'client' => '',
        ]);
    }

    public function unsubscribe(string $channel, string $user): array
    {
        return $this->send('unsubscribe', [
            'channel' => $channel,
            'user' => $user,
            'client' => '',
        ]);
    }

    public function channels(string $pattern): array
    {
        return $this->send('channels', ['pattern' => $pattern]);
    }

    public function generateConnectionToken(string $user, int $expires = 0, array $info = [], array $channels = []): string
    {
        $header = ['typ' => 'JWT', 'alg' => 'HS256'];
        $payload = ['sub' => $user];
        if (! empty($info)) {
            $payload['info'] = $info;
        }
        if (! empty($channels)) {
            $payload['channels'] = $channels;
        }
        if ($expires) {
            $payload['expires'] = $expires;
        }
        $segments = [];
        $segments[] = $this->urlsafeB64Encode(json_encode($header));
        $segments[] = $this->urlsafeB64Encode(json_encode($payload));
        $signing_input = implode('.', $segments);
        $signature = $this->sign($signing_input, $this->getSecret());
        $segments[] = $this->urlsafeB64Encode($signature);

        return implode('.', $segments);
    }

    public function generatePrivateChannelToken(string $client, string $channel, int $expires = 0, array $info = []): string
    {
        $header = ['typ' => 'JWT', 'alg' => 'HS256'];
        $payload = ['channel' => $channel, 'client' => $client];
        if (! empty($info)) {
            $payload['info'] = $info;
        }
        if ($expires) {
            $payload['expires'] = $expires;
        }
        $segments = [];
        $segments[] = $this->urlsafeB64Encode(json_encode($header));
        $segments[] = $this->urlsafeB64Encode(json_encode($payload));
        $signing_input = implode('.', $segments);
        $signature = $this->sign($signing_input, $this->getSecret());
        $segments[] = $this->urlsafeB64Encode($signature);

        return implode('.', $segments);
    }

    protected function send(string $method, array $payload = []): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'apikey'.$this->config['api_key'],
        ];

        try {
            $url = parse_url($this->config['url']);

            $config = collect([
                'headers' => $headers,
                'body' => json_encode(['method' => $method, 'params' => $payload]),
                'http_errors' => true,
            ]);

            if (! empty($url['scheme']) && $url['scheme'] === 'https') {
                $config->put('verify', collect($this->config)->get('verify', false));

                if (collect($this->config)->get('ssl_key')) {
                    $config->put('ssl_key', collect($this->config)->get('ssl_key'));
                }
            }

            $response = $this->client->post($this->config['url'], $config->toArray());
            $result = json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            $result = [
                'method' => $method,
                'error' => $exception->getMessage(),
                'body' => $payload,
            ];
        }

        return $result;
    }

    protected function urlsafeB64Encode(string $input): string
    {
        return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
    }

    protected function sign(string $input, string $key): string
    {
        return hash_hmac('sha256', $input, $key, true);
    }

    protected function getApiKey(): string
    {
        return $this->config['api_key'];
    }

    protected function getSecret(): string
    {
        return $this->config['token_hmac_secret_key'];
    }
}
