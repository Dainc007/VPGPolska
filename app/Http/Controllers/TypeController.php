<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
    public function store(TypeRequest $request)
    {
        foreach (array_combine($request['ids'], $request['results']) as $id => $result) {
            $type = new Type();
            $type->game_id = $id;
            $type->result = $result;
            $type->save();
        }

        back();
    }
}
