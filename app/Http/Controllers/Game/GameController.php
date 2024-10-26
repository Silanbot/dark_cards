<?php

namespace App\Http\Controllers\Game;

use App\Contracts\Game\GameContract;
use App\Game\Card;
use App\Game\Deck;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Setting;
use App\Models\User;
use App\Services\ProfilePhotoAction;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use phpcent\Client;

class GameController extends Controller
{
    public function __construct(
        private readonly GameContract $contract,
        private readonly Client $centrifugo
    ) {}

    public function createGame(Request $request): array
    {
        $settingNames = $request->get('settings');
        $settingNames = array_filter(explode(',', $settingNames));

        $room = Room::query()->create($request->only('bank'));
        $settings = Setting::query()->whereIn('name', $settingNames)->pluck('id');

        $room->settings()->attach($settings);

        return [
            'id' => $room->id,
        ];
    }

    public function searching(Request $request): array
    {
//        $room = Room::query()->whereBetween('bank', $request->get('bank'))
//            ->where('game_type', $request->get('type'))
//            ->where('max_gamers', $request->get('max_players'))
//            ->first();

        $room = Room::query()->latest()->first();

        return [
            'room_id' => $room?->id,
        ];
    }

    public function join(Request $request, ProfilePhotoAction $action): JsonResponse
    {
        $player = $request->get('user_id');
        $room = Room::query()->find($request->get('id'));

        $alreadyJoined = $room->join_state ?? collect();
        if ($alreadyJoined->contains($player)) {
            return response()->json(User::query()->findMany($alreadyJoined->reject(fn ($e) => (int) $e === (int) $player)));
        }

        $alreadyJoined->add($player);
        $room->update(['join_state' => $alreadyJoined->toArray()]);
        $alreadyJoined = User::query()->findMany($alreadyJoined);

        /** @var User $user */
        foreach ($alreadyJoined as $user) {
            $user->avatar = $action->extract($user->id);

            $user->save();
        }

        $this->centrifugo->publish('room', [
            'event' => 'user_join_room',
            'user' => User::query()->findOrFail($player),
            'avatar' => $action->extract($player),
        ]);

        return response()->json($alreadyJoined);
    }

    /**
     * @param Request $request
     * @param Room $room
     */
    public function setReadyState(Request $request, Room $room)
    {
        $state = $room->ready_state ?? collect();
        if ($state->contains($request->get('user_id'))) {
            if (2 === count($state)) {
                return response(null, 200);
            }

            unset($state[$state->search($request->get('user_id'))]);
        } else {
            $state->add($request->get('user_id'));
        }

        if (2 !== count($state)) {
            $room->update(['ready_state' => $state->toArray()]);

            return response(null, 200);
        }

        $deck = new Deck($room->ready_state->toArray());
        // Это индексы, а не значения
        $attacker = array_rand($state->toArray());
        // Значение
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

        return response(null, 200);
    }

    public function leave(Request $request): void
    {
        $room = Room::query()->find($request->get('id'));

        $this->contract->userLeft($room->id, $request->get('user_id'));
    }

    public function fight(Request $request): void
    {
        $this->contract->beat($request->get('fight_card'), $request->get('card'), $request->get('room_id'), $request->get('user_id'));
    }

    public function takeFromDeck(Request $request): void
    {
        $this->contract->takeFromDeck($request->get('id'), $request->get('user_id'), $request->get('count'));
    }

    public function takeFromTable(Request $request): void
    {
        $this->contract->takeFromTable($request->get('id'), $request->get('player'));
    }

    public function revertCard(Request $request): void
    {
        $this->contract->revertCard($request->get('card'), $request->get('room_id'), $request->get('player'));
    }

    public function discardCard(Request $request): void
    {
        $this->contract->discardCard(Card::build($request->get('card')), $request->get('room_id'), $request->get('user_id'));
    }

    public function beats(Request $request): void
    {
        $this->contract->beats($request->get('id'), $request->get('player'));
    }
}
