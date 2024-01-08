<?php

namespace App\Models;

use App\Traits\HasLogsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointTransaction extends Model
{
    use HasFactory;
    use HasLogsTrait;

    protected $fillable = [
        "points",
        "user_id",
        "note",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
