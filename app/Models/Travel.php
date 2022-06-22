<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Travel extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_id', 'route_id'
    ];

    protected $table = 'passenger_route';
}
