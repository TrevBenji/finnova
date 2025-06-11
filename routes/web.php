<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;

Route::middleware(['auth', 'role:admin'])->post('/system-settings', [SettingsController::class, 'update'])->name('settings.update');

Route::get('/', function () {
    return view('home'); // or 'landing' or whatever your hompage file is called
});
// Dashboard Route for Authenticated Users
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/get-started', function () {
    return view('get-started');
})->name('get-started');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::view('/system-settings', 'system-settings')->name('settings');
    Route::view('/audit-logs', 'audit-logs')->name('logs');
    Route::view('/customers', 'customers')->name('customers');
    Route::view('/loans', 'loans')->name('loans');
    Route::view('/transactions', 'transactions')->name('transactions');
});

use App\Models\Customer;

Route::middleware(['auth'])->get('/customers', function () {
    $customers = Customer::latest()->get(); // or use pagination if you prefer
    return view('customers', compact('customers'));
})->name('customers');
use App\Models\AuditLog;

Route::middleware(['auth', 'role:admin'])->get('/audit-logs', function () {
    $logs = AuditLog::latest()->limit(50)->get(); // or paginate if needed
    return view('audit-logs', compact('logs'));
})->name('logs');
use App\Models\Loan;

Route::middleware(['auth'])->get('/loans', function () {
    $loans = Loan::with('customer')->latest()->get(); // eager load customer
    return view('loans', compact('loans'));
})->name('loans');
use App\Models\Transaction;

Route::middleware(['auth'])->get('/transactions', function () {
    $transactions = Transaction::with('customer')->latest()->get();
    return view('transactions', compact('transactions'));
})->name('transactions');

Route::get('/session-test', function () {
    session(['test-session' => 'working']);
    return session('test-session') === 'working'
        ? '✅ Session works!'
        : '❌ Session is broken';
});