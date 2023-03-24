<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function boot() {
        parent::boot();
        
        static::creating(function ($model) {
            $model->liked_at = now()->timestamp;
        });
    }

    public function likeable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
