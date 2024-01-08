<?php

namespace App\Models;

use App\Traits\HasImageTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PostImage extends Model
{
    use HasImageTrait;

    protected $fillable = [
        "post_id",
        "image",
    ];

    function post(): HasOne
    {
        return $this->hasOne(Post::class);
    }
}
