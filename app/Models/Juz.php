<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juz extends Model
{
    public function start_verse()
    {
        return $this->hasOne(Verse::class, 'id', 'start_verse_id');
    }
}
