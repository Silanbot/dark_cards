<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Game\GameContract;
use App\Game\Card;
use App\Http\Controllers\Controller;
use App\Game\Deck;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use phpcent\Client;

class GameController extends Controller
{
    public function __construct(
        private readonly GameContract $contract,
        private readonly Client $centrifugo
    ) {
    }

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
            ->where('max_gamers', $request->max_gamers)
            ->first();

        return [
            'room_id' => $room->id,
        ];
    }

    public function join(Request $request)
    {
        $player = $request->user_id;
        $room = Room::query()->find($request->id);

        $already_joined = $room->join_state ?? collect([]);
        if ($already_joined->doesntContain($player)) $already_joined->add($player);
        $room->update(['join_state' => $already_joined->toArray()]);
        unset($already_joined[$already_joined->search($player)]);
        $already_joined = User::query()->findMany($already_joined);

        $this->centrifugo->publish('room', [
            'event' => 'user_join_room',
            'user' => User::query()->findOrFail($player),
        ]);

        return response($already_joined->toArray());
    }

    public function setReadyState(Request $request, Room $room)
    {
        $state = $room->ready_state ?? collect([]);
        if ($state->contains($request->user_id)) {
            if ($room->max_gamers === count($state)) return response(null, 400);

            unset($state[$state->search($request->user_id)]);
        } else $state->add($request->user_id);

        if ($room->max_gamers !== count($state)) {
            $room->update(['ready_state' => $state->toArray()]);
            return;
        }

        $deck = new Deck($room->ready_state->toArray());
        $room->update([
            'ready_state' => $state->toArray(),
            'deck' => collect([
                'cards' => $deck->getCards(),
                'players' => $deck->getPlayers(),
                'table' => [],
                'trump' => $deck->getTrumpCard()->getSuit(),
            ]),
        ]);
        $this->centrifugo->publish('room', [
            'deck' => $deck->getCards(),
            'players' => $deck->getPlayers(),
            'event' => 'game_started',
        ]);
    }

    public function leave(Request $request): void
    {
        $room = Room::query()->find($request->id);

        $this->contract->userLeft($room->id, $request->user_id);
    }

    public function fight(Request $request): void
    {
        $room = Room::query()->find($request->room_id)->get();
        $this->contract->beat($request->fight_card, $request->card, $room);
    }

    public function takeFromDeck(Request $request): void
    {
        $this->contract->takeFromDeck($request->id, $request->player);
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
        $this->contract->discardCard(Card::build($request->card), $request->room_id);
    }
}
