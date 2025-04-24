<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvd extends Model
{
    /** @use HasFactory<\Database\Factories\DvdFactory> */
    use HasFactory;

    public function genres() {
        return $this->belongsToMany(Genre::class);
    }

    public function dvdformat() {
        return $this->belongsTo(Dvdformat::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }
}