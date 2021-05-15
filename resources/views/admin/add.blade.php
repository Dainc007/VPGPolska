@extends('layouts.basic')

@section('content')

@if(count($games) > 0)
<form method="POST" action="{{ route('matchday.update') }}">
    @foreach($games as $game)
    <h6>{{$game->host}} vs {{$game->visitor}}</h6>
    <input type="hidden" value="{{$game->id}}" name="ids[]">
    <select id="game" name="results[]" class="block mt-1" required>
        <option value="host_win">Wygrana {{$game->host}}</option>
        <option value="draw">Remis</option>
        <option value="visitor_win">Wygrana {{$game->visitor}}</option>
    </select>
    @endforeach

    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            Aktualizuj
        </x-button>
    </div>
    @method('POST')
    @csrf
</form>

@else
<form method="POST" action="{{ route('matchday.store') }}">
    <div class="form-row">
        @for($game=0; count($teams)/2>$game; $game++)
        <div class="form-col">
            <select id="hosts" name="hosts[]" class="block mt-1" required>
                @foreach($teams as $team)
                <option value="{{$team}}">{{$team}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-col">
            <select id="visitors" name="visitors[]" class="block mt-1" required>
                @foreach($teams as $team)
                <option value="{{$team}}">{{$team}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endfor


    <div class="flex items-center justify-end mt-4">
        <x-button class="ml-3">
            Dodaj
        </x-button>
    </div>

    @method('POST')
    @csrf
</form>
@endif
@endsection