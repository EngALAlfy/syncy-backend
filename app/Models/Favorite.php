<?php

namespace App\Models;

use App\Traits\HasImageTrait;
use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Favorite extends Model
{
    use HasLogsTrait;

    protected $fillable = [
        "post_id",
        "user_id",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class , "user_id" , "id");
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class , "post_id" , "id");
    }
}
