<?php

namespace App\Models;

use App\Traits\HasLogsTrait;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements Viewable
{
    use HasLogsTrait;
    use InteractsWithViews;

    protected $fillable = [
      "key",
      "value",
    ];
}
