<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;

class TypeController extends Controller
{
    public function store(TypeRequest $request)
    {
        return $request;
    }
}
