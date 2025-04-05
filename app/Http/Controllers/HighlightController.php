<?php

namespace App\Http\Controllers;

use App\Models\HighlightGroup;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    public function show($id)
    {
        $result = HighlightGroup::select('id', 'color')
            ->with([
                'highlights' => function ($query) {
                    $query->select('highlight_group_id', 'number', 'verse_id', 'highlight', 'bold');
                },
                'highlights.verse' => function ($query) {
                    $query->select('id', 'number_in_chapter', 'text', 'page');
                }
            ])
            ->where('id', $id)
            ->first();

        return response()->json(["success" => true, "data" => $result]);
    }
}
