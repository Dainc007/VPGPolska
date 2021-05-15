<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Game;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard', [
            'teams' => Game::all(),
            'user'  => Auth::user()
        ]);
    }

    public function store(TypeRequest $request)
    {
        $matchday = Type::max('matchday');
        $matchday++;

        foreach (array_combine($request['ids'], $request['results']) as $id => $result) {
            $type = new Type();
            $type->game_id = $id;
            $type->user_id = Auth::user()->id;
            $type->result = $result;
            $type->matchday = $matchday;
            $type->save();
        }

        return back();
    }
}
