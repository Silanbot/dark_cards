<?php

namespace App\Http\Controllers\Friend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function send(Request $request): array
    {
        $user = User::query()->findOrFail($request->user_id);
        $recipient = User::query()->findOrFail($request->recipient_id);

        $user->befriend($recipient);

        return [
            'success' => true,
        ];
    }

    public function accept(Request $request): array
    {
        $user = User::query()->findOrFail($request->user_id);
        $sender = User::query()->findOrFail($request->sender_id);

        $user->acceptFriendRequest($sender);

        return [
            'success' => true,
        ];
    }

    public function index(Request $request)
    {
        $user = User::query()->findOrFail($request->user_id);

        return $user->getAllFriendships();
    }

    public function pending(Request $request): array
    {
        $user = User::query()->findOrFail($request->user_id);

        return $user->getFriendRequests();
    }

    public function search(Request $request)
    {
        return response()->json(User::query()->where('id', $request->id)->get());
    }
}
