<?php

namespace App\Http\Controllers;

use App\Models\Verse;
use Illuminate\Http\Request;

class VerseController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'page' => 'nullable|integer',
            'chapter' => 'nullable|integer',
            'with-highlights' => 'nullable|in:true,false,1,0',
            'with-underlines' => 'nullable|in:true,false,1,0',
        ], [
            'with-highlights.in' => 'The with-highlights field must be a boolean',
            'with-underlines.in' => 'The with-underlines field must be a boolean',
        ]);

        $page = $validated['page'] ?? null;
        $chapter = $validated['chapter'] ?? null;

        $withHighlights = isset($validated['with-highlights'])
            ? filter_var($validated['with-highlights'], FILTER_VALIDATE_BOOLEAN)
            : false;

        $withUnderlines = isset($validated['with-underlines'])
            ? filter_var($validated['with-underlines'], FILTER_VALIDATE_BOOLEAN)
            : false;

        $query = Verse::query();

        if ($page) {
            $query->where('page', $page);
        }

        if ($chapter) {
            $query->select('id', 'number_in_chapter', 'page', 'chapter_id');
            $query->where('chapter_id', $chapter);
        }

        if ($withHighlights) {
            $query->with('highlights.highlightGroup');
        }

        if ($withUnderlines) {
            $query->with('underlines');
        }

        $result = $query->get();

        $result = $result->when($withHighlights, function ($collection) {
            return $collection->map(function ($verse) {
                $verse->highlights->transform(function ($highlight) {
                    if ($highlight->highlightGroup) {
                        $highlight->color = $highlight->highlightGroup->color;
                    }
                    unset($highlight->highlightGroup);
                    return $highlight;
                });
                return $verse;
            });
        });

        return response()->json([
            "success" => true,
            "data" => $result,
        ]);
    }
}
