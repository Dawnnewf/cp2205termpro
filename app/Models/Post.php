<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters) {
        // search
        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        }

        // category filter
        if (isset($filters['category'])) {
            $query->whereHas(
                'category',
                fn($query) => $query->where('id', $filters['category'])
            );
        }
    }
}
