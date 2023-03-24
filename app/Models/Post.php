<?php

namespace App\Models;

use App\Traits\IsLikeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory, IsLikeable;

    protected $fillable = [
        'title',
        'content',
        'is_nsfw',
    ];

    const CREATED_AT = 'posted_at';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = uuid();
        });
    }

    public function poster(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }
}
