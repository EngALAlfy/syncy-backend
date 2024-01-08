<?php

namespace App\Models;

use App\Traits\HasImageTrait;
use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;
    use HasLogsTrait;
    use HasImageTrait;

    protected $fillable = [
        "name",
        "image",
        "code",
    ];

    protected $appends = [
        "image_url",
    ];

    public static array $rules = [

    ];

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
