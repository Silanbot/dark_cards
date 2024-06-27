<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Repositories\Contracts\MessageRepositoryContract;
use Illuminate\Http\Request;
use phpcent\Client;

class MessageController extends Controller
{
    public function __construct(
        private readonly MessageRepositoryContract $entity
    ) {
    }

    public function index(Request $request, Client $centrifuge)
    {
        $messages = $this->entity->messages($request->room_id);

        return response()->json($messages);
    }

    public function send(Request $request, Client $centrifuge): void
    {
        $message = Message::query()->create([
            'message' => $request->message,
            'room_id' => $request->room_id,
            'user_id' => $request->user_id,
        ]);

        $centrifuge->publish($request->room_name, [
            'message' => $message->message,
            'user_id' => $message->user_id,
        ]);
    }
}
