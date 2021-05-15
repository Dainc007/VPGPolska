<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add()
    {
        return view('admin.add', [
            'teams' => Game::AVAILABLE_TEAMS,
            'games' => Game::where('result', null)->get()
        ]);
    }

    public function store(Request $request)
    {
        $matchday = Game::max('matchday');
        $matchday++;

        $carbon = new CarbonImmutable();

        $games = array_combine($request['hosts'], $request['visitors']);

        foreach ($games as $key => $value) {
            $game = new Game();
            $game->host = $key;
            $game->visitor = $value;
            $game->matchday = $matchday;
            $game->dateTime = $carbon->next(CarbonImmutable::SUNDAY);
            $game->save();
        }
        return back();
    }

    public function update(Request $request)
    {
        $games = array_combine($request['ids'], $request['results']);

        foreach ($games as $id => $result) {
            $game = Game::find($id);
            $game->result = $result;
            $game->save();
        }
        return back();
    }
}
