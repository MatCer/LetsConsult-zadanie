<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('authors', AuthorController::class)->except(['show']);
Route::resource('books', BookController::class)->except(['show']);
Route::post('books/{book}/toggle-borrowed', [BookController::class, 'toggleBorrowed'])->name('books.toggle-borrowed');
