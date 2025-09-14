<?php

namespace App\Actions;

use App\Models\Game;
use App\Models\User;

interface AddsGameToLibrary
{
    public function __invoke(string $gameName, User $gameOwner): Game;
}
