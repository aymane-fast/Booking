<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

$dashboard = function () {
    $reservations = \App\Models\Reservation::all();
    return view('dashboard', ['reservations' => $reservations]);
};

Route::get('/', $dashboard)->middleware(['auth', 'verified'])->name('home');
Route::get('/dashboard', $dashboard)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}/{date?}', [RoomController::class, 'show'])->name('rooms.show');
    Route::get('/reservations/create/{date}/{session}/{room_id}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/reservations/receipt/{reservation}', [ReservationController::class, 'receipt'])->name('reservations.receipt');
});





require __DIR__ . '/auth.php';
