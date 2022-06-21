<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Travel extends Model
{
    use HasFactory;

    public function routes(): HasMany
    {
        return $this->hasMany(Route::class);
    }

    public function passengers(): HasMany
    {
        return $this->hasMany(Passenger::class);
    }
}
