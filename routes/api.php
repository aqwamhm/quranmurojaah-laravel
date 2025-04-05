<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\JuzController;
use App\Http\Controllers\UnderlineController;
use App\Http\Controllers\VerseController;
use App\Models\Underline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/chapters', [ChapterController::class, 'index']);

Route::get('/juz', [JuzController::class, 'index']);

Route::get('/verses', [VerseController::class, 'index']);

Route::get('/underlines/{id}', [UnderlineController::class, 'show']);
