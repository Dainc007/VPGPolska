<?php

namespace App\Observers;

use App\Models\Game;
use App\Models\Type;

class GameObserver
{
    public function updated(Game $game)
    {
        $types = Type::where('game_id', $game->id)->get();

        foreach ($types as $type) {
            if ($type->result === $game->result) {
                Type::where('id', $type->id)->update(['point' => 1]);
            }
        }
    }
}
