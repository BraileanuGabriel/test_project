<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sportsman extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'gen', 'height', 'weight', 'age', 'competition_id'
    ];

    public function competition(): HasOne
    {
        return $this->hasOne(Competition::class);
    }
}
