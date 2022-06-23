<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category'
    ];

    public function sportsmen(): BelongsToMany
    {
        return $this->belongsToMany(Sportsman::class);
    }
}