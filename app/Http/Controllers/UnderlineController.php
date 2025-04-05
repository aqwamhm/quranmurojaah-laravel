<?php

namespace App\Http\Controllers;

use App\Models\Underline;
use Illuminate\Http\Request;

class UnderlineController extends Controller
{
    public function show($id)
    {
        $result = Underline::where('group_id', $id)->get();

        return response()->json(["success" => true, "data" => $result]);
    }
}
