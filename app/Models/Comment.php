<?php

namespace App\Models;

use App\Traits\IsLikeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory, IsLikeable;

    protected $fillable = [
        'content',
    ];

    const CREATED_AT = 'commented_at';

    public static function boot(): void
    {
        static::creating(function ($model) {
            $model->uuid = uuid();
        });
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function originalComment(): ?BelongsTo
    {
        return $this->belongsTo(Comment::class, 'original_comment_id');
    }

    public function poster(): ?BelongsTo
    {
        return $this->belongsTo(User::class, 'poster_id');
    }
}
