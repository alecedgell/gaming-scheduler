<?php

namespace App\Livewire;

use App\Actions\AddGameToLibrary;
use App\Actions\AddsGamesToLibrary;
use App\Actions\CreatesGame;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class GameLibrary extends Component
{

    public Collection $games;

    #[Validate('unique:games,name')]
    public string $gameName = '';

    public function mount(): void
    {
        $this->games = auth()->user()->games;
    }

    public function addGameToLibrary(AddsGamesToLibrary $addGameToLibrary): void
    {
        $this->validate();

        $game = $addGameToLibrary(
            gameName: $this->gameName,
            gameOwner: auth()->user()
        );

        $this->games[] = $game;
    }

    public function render()
    {
        return view('livewire.game-library');
    }
}
