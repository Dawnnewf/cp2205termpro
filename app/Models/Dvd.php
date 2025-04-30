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

    public function scopeFilter($query, array $filters) {
        //search
        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%' );
        }

        if (isset($filters['dvdformat'])) {
            $query->where('dvdformat_id', $filters['dvdformat'] );
        }

        if (isset($filters['type'])) {
            $query->where('type_id', $filters['type'] );
        }

        if (isset($filters['location'])) {
            $query->where('location_id', $filters['location'] );
        }

        if (isset($filters['genre'])) {
            $category_id = $filters['genre'];

            $query->whereHas(
                'genres',
                function ($query) use ($category_id) {
                    $query->where('genre_id', $category_id);
                }
            );
        }

        if (isset($filters['rating'])) {
            $query->where('starRating', '>=', $filters['rating'] );
        }

        if (isset($filters['sort'])) {

            if  ( $filters['sort'] == 'dvdformat' ) {
                $query->orderBy('dvdformat_id', 'ASC');
            }

            if  ( $filters['sort'] == 'type' ) {
                $query->orderBy('type_id', 'DESC');
            }

            if  ( $filters['sort'] == 'location' ) {
                $query->orderBy('location_id', 'ASC');
            }
        }
    }
}
