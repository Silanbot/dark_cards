<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class ProfilePhotoAction
{
    public function extract(): ?string
    {
        $response = Http::post('https://api.telegram.org/bot/'.config('bot.token').'/userProfilePhotos', [
            'user_id' => auth()->id(),
        ]);

        return $response->json('result.photos.0.file_id');
    }
}
