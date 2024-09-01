<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

final class ProfilePhotoAction
{
    public function extract(int $id): ?string
    {
        $response = Http::post('https://api.telegram.org/bot'.config('bot.token').'/getUserProfilePhotos', [
            'user_id' => $id,
        ]);

        if ($response->json('result.total_count') === 0) {
            return '/sources/profile.jpg';
        }

        $fileID = $response->json('result.photos.0.1.file_id');
        $response = Http::post('https://api.telegram.org/bot'.config('bot.token').'/getFile', [
            'file_id' => $fileID,
        ]);

        $path = $response->json('result.file_path');

        return 'https://api.telegram.org/file/bot'.config('bot.token').'/'.$path;
    }
}
