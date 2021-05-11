<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public const AVAILABLE_TEAMS = [
        'Menago League',
        'E11',
        'SVG',
        'FC Badgers',
    ];

    public const AVAILABLE_RESULTS = [
        'host_win',
        'visitor_win',
        'draw',
    ];

    protected $fillable = [
        'host',
        'visitor',
        'host_goals',
        'visitor_goals',
        'matchday',
    ];
}
