<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function __invoke(Request $request): Collection|array
    {
        return Room::query()->where('password', $request->password)->get();
    }
}
