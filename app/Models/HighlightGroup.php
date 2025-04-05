<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HighlightGroup extends Model
{
    public $incrementing = false;

    public function highlights()
    {
        return $this->hasMany(Highlight::class);
    }
}
