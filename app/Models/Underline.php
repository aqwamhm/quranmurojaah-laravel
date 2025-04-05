<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Underline extends Model
{
    public function verse()
    {
        return $this->belongsTo(Verse::class);
    }
}
