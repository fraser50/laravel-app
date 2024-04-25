<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupImageMember extends Model
{
    use HasFactory;

    public function group(): BelongsTo {
        return $this->belongsTo(Group::class, 'id');
    }

    public function image(): BelongsTo {

        return $this->belongsTo(Image::class, 'id');
    }
}
