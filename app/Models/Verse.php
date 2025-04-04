<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verse extends Model
{
    public function underlines()
    {
        return $this->hasMany(Underline::class);
    }

    public function highlights()
    {
        return $this->hasMany(Highlight::class);
    }
}
