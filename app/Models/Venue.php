<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'venue_name', 
        'venue_address', 
        'venue_max_capacity'
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'fk_venue_event', 'id_venue');
    }

}


