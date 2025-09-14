<?php

namespace App\Actions;

use App\Models\Game;
use App\Models\User;

class AddGameToLibrary implements AddsGameToLibrary
{
    public function __invoke(string $gameName, User $gameOwner): Game
    {
        $game = Game::firstOrCreate(['name' => $gameName]);
        $game->users()->attach($gameOwner);

        return $game;
    }
}
