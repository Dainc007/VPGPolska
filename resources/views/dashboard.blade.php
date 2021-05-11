<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                 
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('type.store') }}">
                        <div>
                            @foreach($teams as $game)
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
                                    Dodaj
                                </x-button>
                            </div>

                        </div>
                        @method('POST')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>