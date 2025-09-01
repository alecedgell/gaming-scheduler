<div>
    <form wire:submit="createGame">
        <label for="game_name">
            <input wire:model="gameName" class="bg-gray-500 text-white" id="game_name" type="text" required
                name="game_name" />
        </label>
        <div>
            @error('gameName')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Create game in my library</button>
    </form>
    <ul>
        @foreach ($games as $game)
            <li>{{ $game->name }}</li>
        @endforeach
    </ul>
</div>
