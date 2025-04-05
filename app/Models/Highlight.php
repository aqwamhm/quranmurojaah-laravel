<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    public function verse()
    {
        return $this->belongsTo(Verse::class);
    }

    public function highlightGroup()
    {
        return $this->belongsTo(HighlightGroup::class);
    }
}
