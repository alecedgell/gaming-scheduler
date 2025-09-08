<?php

namespace App\Actions;

use App\Models\Game;
use App\Models\User;

interface CreatesGame
{
    public function __invoke(string $gameName, ?User $gameOwner = null): Game;
}
