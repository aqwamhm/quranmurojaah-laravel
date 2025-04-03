<?php

namespace App\Http\Controllers;

use App\Models\Juz;
use Illuminate\Http\Request;

class JuzController extends Controller
{
    public function index()
    {
        $result = Juz::with('start_verse')->get();
        return response()->json(["success" => true, "data" => $result]);
    }
}
