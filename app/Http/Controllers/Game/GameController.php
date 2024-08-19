<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Game\GameContract;
use App\Game\Card;
use App\Game\Deck;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use App\Services\ProfilePhotoAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use phpcent\Client;

class GameController extends Controller
{
    public function __construct(
        private readonly GameContract $contract,
        private readonly Client $centrifugo
    ) {}

    public function createGame(Request $request): array
    {
        $room = Room::query()->create($request->only(['bank', 'game_type', 'user_id']));

        return [
            'id' => $room->id,
        ];
    }

    public function searching(Request $request): array
    {
        $room = Room::query()->whereBetween('bank', $request->bank)
            ->where('game_type', $request->type)
            ->where('max_gamers', $request->max_players)
            ->first();

        return [
            'room_id' => $room?->id,
        ];
    }

    public function join(Request $request, ProfilePhotoAction $action): JsonResponse
    {
        $player = $request->user_id;
        $room = Room::query()->find($request->id);

        $alreadyJoined = $room->join_state ?? collect([]);
        if ($alreadyJoined->doesntContain($player)) {
            $alreadyJoined->add($player);
        }
        $room->update(['join_state' => $alreadyJoined->toArray()]);
        unset($alreadyJoined[$alreadyJoined->search($player)]);
        $alreadyJoined = User::query()->findMany($alreadyJoined);

        $this->centrifugo->publish('room', [
            'event' => 'user_join_room',
            'user' => User::query()->findOrFail($player),
            'profile_picture' => $action->extract($player),
        ]);

        return response()->json($alreadyJoined);
    }

    public function setReadyState(Request $request, Room $room)
    {
        $state = $room->ready_state ?? collect([]);
        if ($state->contains($request->user_id)) {
            if ($room->max_gamers === count($state)) {
                return response(null, 400);
            }

            unset($state[$state->search($request->user_id)]);
        } else {
            $state->add($request->user_id);
        }

        if ($room->max_gamers !== count($state)) {
            $room->update(['ready_state' => $state->toArray()]);

            return;
        }

        $deck = new Deck($room->ready_state->toArray());
        // Это индексы, а не значения
        $attacker = array_rand($state->toArray());
        $opponent = $state->toArray()[($attacker + 1) % $room->max_gamers];

        $room->update([
            'ready_state' => $state->toArray(),
            'deck' => collect([
                'cards' => $deck->getCards(),
                'players' => $deck->getPlayers(),
                'table' => [],
                'trump' => $deck->getTrumpCard()->getSuit(),
            ]),
            'attacker_player_index' => $state->toArray()[$attacker],
            'opponent_player_index' => $opponent,
        ]);
        $this->centrifugo->publish('room', [
            'deck' => $deck->getCards(),
            'players' => $deck->getPlayers(),
            'event' => 'game_started',
            'attacker_player_index' => $state->toArray()[$attacker],
            'opponent_player_index' => $opponent,
        ]);
    }

    public function leave(Request $request): void
    {
        $room = Room::query()->find($request->id);

        $this->contract->userLeft($room->id, $request->user_id);
    }

    public function fight(Request $request): void
    {
        $this->contract->beat($request->fight_card, $request->card, $request->room_id, $request->user_id);
    }

    public function takeFromDeck(Request $request): void
    {
        $this->contract->takeFromDeck($request->id, $request->user_id, $request->count);
    }

    public function takeFromTable(Request $request): void
    {
        $this->contract->takeFromTable($request->id, $request->player);
    }

    public function revertCard(Request $request): void
    {
        $this->contract->revertCard($request->card, $request->room_id, $request->player);
    }

    public function discardCard(Request $request): void
    {
        $this->contract->discardCard(Card::build($request->card), $request->room_id, $request->user_id);
    }

    public function beats(Request $request): void
    {
        $this->contract->beats($request->id, $request->player);
    }
}
