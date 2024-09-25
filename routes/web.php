<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueuingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminBPController;
use App\Http\Controllers\AdminGRController;

// Halaman Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute Antrian
Route::get('/ticket', [QueuingController::class, 'showTicketForm'])->name('queuing.ticketForm');
Route::post('/check', [QueuingController::class, 'checkNoPolisi'])->name('queuing.check');
Route::post('/store-new-customer', [QueuingController::class, 'storeNewCustomer'])->name('queuing.storeNewCustomer');
Route::get('/queuing/success/{queueId}', [QueuingController::class, 'showSuccessPage'])->name('queuing.success');

// Rute untuk Admin GR
Route::middleware(['checkrole:adminGR'])->group(function () {
    Route::get('/adminGR/dashboard', [AdminGRController::class, 'showDashboard'])->name('adminGR.dashboard'); // Perbaiki nama method
    Route::get('/adminGR/call/{jenisAntrian}', [AdminGRController::class, 'callNextQueue'])->name('adminGR.callNextQueue');
    Route::get('/adminGR/report', [AdminGRController::class, 'showReport'])->name('adminGR.showReport');
    Route::get('/adminGR/export/excel', [AdminGRController::class, 'exportExcel'])->name('adminGR.exportExcel');
    Route::get('/adminGR/export/pdf', [AdminGRController::class, 'exportPDF'])->name('adminGR.exportPDF');
});

// Rute untuk Admin BP
Route::middleware(['checkrole:adminBP'])->group(function () {
    Route::get('/adminBP/dashboard', [AdminBPController::class, 'showBPDashboard'])->name('adminBP.dashboard');
    Route::get('/adminBP/call/{jenisAntrian}', [AdminBPController::class, 'callNextQueue'])->name('adminBP.callNextQueue');
    Route::get('/adminBP/report', [AdminBPController::class, 'showReport'])->name('adminBP.showReport');
    Route::get('/adminBP/export/excel', [AdminBPController::class, 'exportExcel'])->name('adminBP.exportExcel');
    Route::get('/adminBP/export/pdf', [AdminBPController::class, 'exportPDF'])->name('adminBP.exportPDF');
});
