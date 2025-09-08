<?php

use App\Models\Game;
use App\Models\User;

it('is able to associate a user to a game', function () {
    $user = User::factory()->create();
    $sut = Game::factory()->create();
    $sut->users()->attach($user);
    expect($user->games)->toHaveCount(1);
});
