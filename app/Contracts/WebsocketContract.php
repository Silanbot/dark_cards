<?php

namespace App\Contracts;

interface WebsocketContract
{
    public function publish(string $channel, array $data): array;

    public function broadcast(array $channels, array $data): array;

    public function presence(string $channel): array;

    public function subscribe(string $channel, string $user): array;

    public function unsubscribe(string $channel, string $user): array;

    public function channels(string $pattern): array;

    public function generateConnectionToken(string $user, int $expires = 0, array $info = [], array $channels = []): string;

    public function generatePrivateChannelToken(string $client, string $channel, int $expires = 0, array $info = []): string;
}
