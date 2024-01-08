<?php

namespace App\Models;

use App\Traits\HasImageTrait;
use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasLogsTrait;
    use HasImageTrait;

    protected $appends = [
        "image_url",
    ];

    protected $fillable = [
        "name",
        "image",
        "short_desc",
        "parent_id",
    ];

    public function subCategories(): HasMany
    {
        return $this->hasMany(Category::class , "parent_id" , "id");
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class , "parent_id" , "id");
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
