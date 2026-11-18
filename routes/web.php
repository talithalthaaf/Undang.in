<?php

use App\Http\Controllers\WeddingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/wedding/edit', [WeddingController::class, 'edit'])->name('wedding.edit');

    Route::post('/wedding/couple', [WeddingController::class, 'updateCouple'])->name('wedding.update.couple');
    Route::post('/wedding/event', [WeddingController::class, 'updateEvent'])->name('wedding.update.event');
    Route::post('/wedding/notes', [WeddingController::class, 'updateNotes'])->name('wedding.update.notes');
    Route::post('/wedding/story', [WeddingController::class, 'updateStory'])->name('wedding.update.story');
    Route::post('/wedding/photo', [WeddingController::class, 'uploadPhoto'])->name('wedding.upload.photo');
    Route::delete('/wedding/photo/{index}', [WeddingController::class, 'deletePhoto'])->name('wedding.delete.photo');
    Route::post('/wedding/template', [WeddingController::class, 'updateTemplate'])->name('wedding.update.template');
    Route::post('/wedding/generate-link', [WeddingController::class, 'generateLink'])->name('wedding.generate.link');
});