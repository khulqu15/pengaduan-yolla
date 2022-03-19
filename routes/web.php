<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardControlller;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\User\UserController;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('pekat.index');

Route::middleware(['IsMasyarakat'])->group(function() {
    Route::post('/store', [UserController::class, 'storePengaduan'])->name('pekat.store');
    Route::get('/laporan/{siapa?}', [UserController::class, 'laporan'])->name('pekat.laporan');
    Route::get('/logout', [UserController::class, 'logout'])->name('pekat.logout');
});

Route::middleware(['guest'])->group(function () {
    // Login
    Route::post('/login/auth', [UserController::class, 'login'])->name('pekat.login');

    // Register
    Route::get('/register', [UserController::class, 'formRegister'])->name('pekat.formRegister');
    Route::post('/register/auth', [UserController::class, 'register'])->name('pekat.register');
});

Route::prefix('admin')->group( function () {

    Route::middleware(['IsAdmin'])->group(function () {
        // Petugas
        Route::resource('petugas', PetugasController::class);

        // Masyarakat
        Route::resource('masyarakat', MasyarakatController::class);

        // Laporan
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::post('getLaporan', [LaporanController::class,'getLaporan'])->name('Laporan.getLaporan');
        Route::get('laporan/cetak/{from}/{to}' , [LaporanController::class, 'cetakLaporan'])->name('laporan.cetakLaporan');
        Route::get('laporan/cetak_semua' , [LaporanController::class, 'cetakSemua'])->name('laporan.cetakSemua');
    });

    Route::middleware(['IsPetugas'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardControlller::class, 'index'])->name('dashboard.index');

        // Pengaduan
        Route::resource('pengaduan', PengaduanController::class);

        // Tanggapan
        Route::post('tanggapan/createOrUpdate', [TanggapanController::class, 'createOrUpdate'])->name('tanggapan.createOrUpdate');

        // Logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware(['IsGuest'])->group(function () {
        Route::get('/',[AdminController::class, 'formLogin'])->name('admin.formLogin');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});
