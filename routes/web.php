<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');








Route::middleware('auth',)->group(function () {


    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    // Route::get('/details', [AdminController::class, 'details'])->name('details');
    // Route::get('/edit', [AdminController::class, 'edit'])->name('edit');



    Route::post('/shipments/store', [AdminController::class, 'store'])->name('store');
    Route::delete('/shipments/{shipment}destroy', [AdminController::class, 'destroy'])->name('destroy');




    Route::get('/shipments/{shipment}', [AdminController::class, 'show'])->name('show');
    Route::get('/shipments/{shipment}/edit', [AdminController::class, 'edit'])->name('shipments.edit');
    Route::put('/shipments/{shipment}', [AdminController::class, 'update'])->name('shipments.update');
});


Route::get('/', [UserController::class, 'welcome'])->name('welcome');



Route::post('/track', [UserController::class, 'track'])->name('track.package');



Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::get('/services', [UserController::class, 'services'])->name('services');
Route::get('/tracking', [UserController::class, 'tracking'])->name('tracking');
Route::get('/track-order', [UserController::class, 'trackorder'])->name('track-order');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
