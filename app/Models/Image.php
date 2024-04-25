<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, "author");
    }

    public function memberships(): HasMany {
        return $this->hasMany(GroupImageMember::class, 'image_id');
    }
}
