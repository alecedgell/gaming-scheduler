<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\GameLibrary;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Ramsey\Uuid\Uuid;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/auth/redirect', function () {
    if (!Auth::check()) {
        return Socialite::driver('discord')->redirect();
    }
    return redirect(route('dashboard'));
})->name('auth.redirect');



Route::get('/auth/callback', function () {
    $discordUser = Socialite::driver('discord')->user();
    $user = User::updateOrCreate([
        'discord_user' => $discordUser->email,
    ], [
        'name' => $discordUser->name,
        'email' => $discordUser->email,
        'password' => Hash::make(Uuid::uuid4()),
        'discord_user' => $discordUser->email,
    ]);
    Auth::login($user);
    return redirect(route('dashboard'));
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('games/library', GameLibrary::class)->name('game.library');
});

require __DIR__ . '/auth.php';
