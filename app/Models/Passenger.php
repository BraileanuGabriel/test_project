<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'contact'
    ];

    public function travel(): BelongsToMany
    {
        return $this->belongsToMany(Travel::class);
    }
}
