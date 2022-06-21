<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination', 'class', 'price'
    ];

    public function getRouteKeyName()
    {
        return 'code_route';
    }

    public function travel(): BelongsToMany
    {
        return $this->belongsToMany(Travel::class);
    }
}
