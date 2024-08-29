<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;


Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');

    Route::view('/quotes', 'admin.quotes.quote')->name('admin.quotes');
    Route::view('/create-quote', 'admin.quotes.create')->name('quote.create');
    Route::view('/edit-quote/{id}', 'admin.quotes.edit')->name('quote.edit');

    //background Image
    Route::view('/background-image', 'admin.background-image.background-image')->name('background.image');
    Route::view('/add-image', 'admin.background-image.create')->name('add.image');
    Route::view('/edit-image/{id}', 'admin.background-image.edit')->name('image.edit');

    //update password
    Route::view('/update-password', 'admin.admin-update-password')->name('update.password');

    //cards
    Route::view('/cards', 'admin.cards.card')->name('cards');
    Route::view('/create-cards', 'admin.cards.create')->name('create.cards');
    Route::get('/export-cards', [CardController::class, 'exportCsv'])->name('cards.exportCsv');
    Route::get('/export-new-cards', [CardController::class, 'exportNewCards'])->name('export.new.cards');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
