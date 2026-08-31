<?php

use App\Http\Controllers\ArtPriceListController;
use Illuminate\Support\Facades\Route;

// Price list PDF of an art gallery entry, e.g. /art/echoes-of-intimacy/pl.pdf
Route::get('art/{slug}/pl.pdf', ArtPriceListController::class)->name('art.pricelist');
