<?php

namespace App\Contracts;

interface WebsocketContract
{
    /**
     * Опубликовать в определнный канал данные
     */
    public function publish(string $channel, array $data): void;

    /**
     * Уведомления во все перечисленные каналы
     */
    public function broadcast(array $channels, array $data): void;
}
