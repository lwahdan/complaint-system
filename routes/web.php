<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
// return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {

    // Redirect based on role
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
        }
        if (auth()->user()->role === 'user') {
            return redirect()->route('user.dashboard');
        }
        //return redirect()->route('user.dashboard');
    });

    // User Dashboard
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
    // Route::get('/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');
});

// Admin-Only Routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    //Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard_index'])->name('admin.index');
    //user
    Route::get('/users', [AdminController::class, 'viewUsers'])->name('admin.users');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    //complaint
    Route::get('/complaints', [AdminController::class, 'viewComplaints'])->name('admin.complaints');
    Route::get('/complaints/{id}', [AdminController::class, 'showComplaint'])->name('admin.complaints.show');
     Route::get('/complaints/{id}/edit', [AdminController::class, 'editComplaint'])->name('admin.complaints.edit');
    Route::put('/complaints/{id}', [AdminController::class, 'updateComplaint'])->name('admin.complaints.update');

    Route::post('/complaints/create', [AdminController::class, 'createComplaint'])->name('admin.complaints.create');
    Route::post('/complaints/{id}/destroy', [AdminController::class, 'destroyComplaint'])->name('admin.complaints.destroy');
    //audit-logs
    Route::get('/audit-logs', [AdminController::class, 'viewAuditLogs'])->name('admin.audit-logs');
});

require __DIR__ . '/auth.php';
