<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


// Route::put();
// Route::patch();
// Route::delete();
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::resource("products",ProductController::class)->middleware(["auth","can:create_product"]);

/**
 *  /products               - get                  => index
 *  /products/create        - get           => create
 *  /products               - post                 => store
 *  /products/product_id     - get       => show
 *  /products/product_id/edit - get  => edit
 *  /products/product_id - put/patch => update
 *  /products/product_id - delete    => destroy
*/


