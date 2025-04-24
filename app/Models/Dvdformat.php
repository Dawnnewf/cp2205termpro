<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dvdformat extends Model
{
    /** @use HasFactory<\Database\Factories\DvdformatFactory> */
    use HasFactory;

    public function dvds() {
        return $this->hasMany(Dvd::class);
    }
}
