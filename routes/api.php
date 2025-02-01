<?php

use App\Http\Controllers\Api\CatalogController;
use Illuminate\Support\Facades\Route;

Route::get('/catalogs', [CatalogController::class, 'catalogs']);
