<?php

// namespace App\Actions;
//
// use App\Models\Game;
// use App\Models\User;
//
// class CreateGame implements CreatesGame
// {
//     public function __invoke(string $gameName, ?User $gameOwner = null): Game
//     {
//         $game = Game::firstOrCreate(['name' => $gameName]);
//
//         if ($gameOwner) {
//             $game->users()->attach($gameOwner);
//         }
//
//         return $game;
//     }
//}


namespace App\Actions;

use App\Models\Game;
use App\Models\User;

class ScheduleGame implements SchedulesGame
{
    public function __invoke(): Game
    {
        $session =



        return $session;
    }




}













?>
