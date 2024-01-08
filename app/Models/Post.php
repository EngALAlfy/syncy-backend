<?php

namespace App\Models;

use App\Traits\HasImageTrait;
use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use HasLogsTrait;
    use HasImageTrait;

    protected $fillable = [
        "name",
        "image",
        "short_desc",
        "desc",
        "price",
        "owner_id",
        "custom_email",
        "custom_phone",
        "country_id",
        "state_id",
        "category_id",
        "is_featured",
    ];

    protected $casts = [
        "is_featured" => "boolean"
    ];

    protected $appends = [
        "is_favorite",
        "image_url",
        "images_urls",
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, "owner_id", "id");
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function getIsFavoriteAttribute(): bool
    {
        return $this->favorites()->where("user_id", auth()->id())->count() > 0;
    }

    public function getImagesUrlsAttribute()
    {
        $urls = $this->images->pluck("image_url")->toArray();
        $urls[] = $this->image_url;

        return $urls;
    }

    public function startFeatured(): bool
    {
        $this->is_featured = true;
        return $this->save();
    }

    public function stopFeatured(): bool
    {
        $this->is_featured = false;
        return $this->save();
    }

    function images(): HasMany
    {
        return $this->hasMany(PostImage::class);
    }
}
