<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request): Model|Builder
    {
        return User::query()->firstOrCreate(['id' => $request->get('id')], [
            'id' => $request->get('id'),
            'username' => $request->get('username'),
        ]);
    }
}
