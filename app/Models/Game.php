<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * @return BelongsToMany<User,Game,Pivot>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
