<?php

use App\Http\Controllers\AdminDuriController;
use App\Http\Controllers\AdminJKTController;
use App\Http\Controllers\AdminPkuController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PhrController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TuanRumahController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homee');
});
// Route::get('/pengajuan-tamu', [TamuController::class, 'createForm'])->name('tamu.create');
Route::post('/pengajuan-tamu', [TamuController::class, 'store'])->name('tamu.store');
Route::get('/pengajuan-tamu/create', [TamuController::class, 'create'])->name('tamu.create');
Route::get('/pengajuan-tamu2', [TamuController::class, 'surat2'])->name('tamu.surat2');
Route::get('/pengajuan-tamu-kantor', [TamuController::class, 'surat2jkt'])->name('tamu.surat2jkt');
Route::post('/datatamu', [TamuController::class, 'datatamu'])->name('datatamu.store');
Route::post('/simpanTamu', [TamuController::class, 'simpanTamu'])->name('simpanTamu');
Route::post('/simpanTamukantor', [TamuController::class, 'simpanTamukantor'])->name('simpanTamukantor');
Route::get('/pilih-kendaraan', [TamuController::class, 'pilihKendaraan'])->name('pilih.kendaraan');
Route::post('/simpankendaraan', [TamuController::class, 'simpanKendaraan'])->name('simpankendaraan');
Route::get('/kendaraan', [TamuController::class, 'kendaraan'])->name('kendaraan');
Route::post('/pengawalan', [TamuController::class, 'pengawalan'])->name('pengawalan');
Route::post('/dijemput', [TamuController::class, 'dijemput'])->name('dijemput');
Route::get('/kode-unik/{surat1_id}', [TamuController::class, 'tampilKodeUnik'])->name('kodeUnik');

Route::get('/status', [TamuController::class, 'status'])->name('status');
Route::post('/status/cari', [TamuController::class, 'cariStatus'])->name('cari-status');
Route::get('/surat2/{id_surat_2_duri}', [TamuController::class, 'show'])->name('surat2.show');
Route::get('/surat2jkt/{id_surat_2}', [TamuController::class, 'showjkt'])->name('surat2.showjkt');
Route::get('/surat2pku/{id_surat_2}', [TamuController::class, 'showpku'])->name('surat2.showpku');
Route::get('/cetak-surat/{surat2}', [TamuController::class, 'cetaksurat'])->name('cetak-surat');
Route::get('/cetak-suratjkt/{surat2}', [TamuController::class, 'cetaksuratjkt'])->name('cetak-suratjkt');

Route::get('/mctn', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/home', [DashboardController::class, 'index'])->name('home')->middleware('auth');
//auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('registerform');
Route::post('/store', [AuthController::class, 'store'])->name('store');

Route::middleware(['auth', 'role:1'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "administrator"
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});
Route::middleware(['auth', 'role:2'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin jkt"lihathistory2
    Route::get('/admina', [AdminJKTController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/surat2/{id}', [AdminJKTController::class, 'show'])->name('admin.surat2.show');
    Route::get('/admin/history/{id}', [AdminJKTController::class, 'lihathistory2'])->name('admin.surat2.history');
    Route::post('/admin/approve/{id}', [AdminJKTController::class, 'approve'])->name('admin.approve');
    Route::post('/admin/reject/{id}', [AdminJKTController::class, 'reject'])->name('admin.reject');
    Route::get('/persetujuanadminjkt', [AdminJKTController::class, 'persetujuanadminjkt'])->name('adminjkt.persetujuan');
    Route::get('/historyadminjkt', [AdminJKTController::class, 'historyadminjkt'])->name('adminjkt.history');
    Route::get('/adminjkt/persetujuan/cari', [AdminJKTController::class, 'cari'])->name('adminjkt.persetujuan.cari');
    Route::get('/adminjkt/history/filter', [AdminJKTController::class, 'filterHistory'])->name('adminjkt.history.filter');
});
Route::middleware(['auth', 'role:3'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "tuan"
    Route::get('/tuanrumah', [TuanRumahController::class, 'index'])->name('tuanrumah.home');
    Route::get('/persetujuan', [TuanRumahController::class, 'persetujuan'])->name('tuanrumah.persetujuan');
    // Route::post('/dashboard/persetujuan/cari', [TuanRumahController::class, 'cariNama'])->name('dashboard.persetujuan.cari');
    Route::get('/dashboard/persetujuan/history', [TuanRumahController::class, 'carihistory'])->name('dashboard.persetujuan.history');
    Route::get('/history', [TuanRumahController::class, 'history'])->name('tuanrumah.history');
    Route::get('/tuanrumah/show/{id}', [TuanRumahController::class, 'show'])->name('tuanrumah.show');
    Route::get('/tuanrumah/histori/{id}', [TuanRumahController::class, 'lihathistori'])->name('tuanrumah.lihathistori');
    Route::post('/tuanrumah/delete/{id}', [TuanRumahController::class, 'delete'])->name('tuanrumah.delete');
    Route::post('/tuanrumah/approve/{id}', [TuanRumahController::class, 'approve'])->name('tuanrumah.approve');
    Route::post('/tuanrumah/reject/{id}', [TuanRumahController::class, 'reject'])->name('tuanrumah.reject');
    Route::get('/dashboard/persetujuan/cari', [TuanRumahController::class, 'cari'])->name('dashboard.persetujuan.cari');
    Route::get('/test', [TuanRumahController::class, 'test'])->name('test');
});
Route::middleware(['auth', 'role:4'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "phr"
    Route::get('/phr/surat2/{id}', [PhrController::class, 'show'])->name('phr.surat2.show');
    Route::get('/phr', [PhrController::class, 'index'])->name('phr.home');
    Route::get('/persetujuanphr', [PhrController::class, 'persetujuanphr'])->name('phr.persetujuan');
    Route::get('/historyphr', [PhrController::class, 'historyphr'])->name('phr.history');
    Route::get('/phr/persetujuan/cari', [PhrController::class, 'cari'])->name('phr.persetujuan.cari');
    Route::get('/phr/history/filter', [PhrController::class, 'filterHistory'])->name('phr.history.filter');
    Route::post('/phr/approve/{id_surat_2_duri}', [PHRController::class, 'approve'])->name('phr.approve');
    Route::post('/phr/reject/{id_surat_2_duri}', [PHRController::class, 'reject'])->name('phr.reject');
    Route::get('/phr/history/{id}', [PHRController::class, 'lihathistory2'])->name('phr.surat2.history');
    // Route::get('/phr//{id_surat_2_duri}', [PHRController::class, 'show'])->name('phr.surat2.show');
});
Route::middleware(['auth', 'role:5'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin_duri"
    Route::get('/adminduri/surat2/{id}', [AdminDuriController::class, 'showw'])->name('adminduri.surat.show');
    Route::get('/admin_duri', [AdminDuriController::class, 'index'])->name('admin_duri.dashboard');

    // Route::get('/admin_duri/surat2/{id}', [AdminDuriController::class, 'show'])->name('admin_duri.surat2.show');
    Route::post('/admin_duri/approve/{id}', [AdminDuriController::class, 'approve'])->name('admin_duri.approve');
    Route::post('/admin_duri/reject/{id}', [AdminDuriController::class, 'reject'])->name('admin_duri.reject');
    Route::get('/persetujuanadminduri', [AdminDuriController::class, 'persetujuanadminduri'])->name('adminduri.persetujuan');
    Route::get('/historyadminduri', [AdminDuriController::class, 'historyadminduri'])->name('adminduri.history');
    Route::get('/adminduri/persetujuan/cari', [AdminDuriController::class, 'cari'])->name('adminduri.persetujuan.cari');
    Route::get('/adminduri/history/filter', [AdminDuriController::class, 'filterHistory'])->name('adminduri.history.filter');
    Route::get('/adminduri/history/{id}', [AdminDuriController::class, 'lihathistory2'])->name('adminduri.surat2.history');
});
Route::get('/persetujuanadminduri', [AdminDuriController::class, 'persetujuanadminduri'])->name('adminduri.persetujuan');

Route::middleware(['auth', 'role:6'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "security"
    Route::get('/security', [SecurityController::class, 'index'])->name('security.home');
    Route::get('/security/show/{id_surat_2_duri}', [SecurityController::class, 'show'])->name('security.show');
    Route::get('/historysecurityduri', [SecurityController::class, 'historysecurity'])->name('security.history');
    Route::get('/security/history/{id}', [SecurityController::class, 'lihathistory2'])->name('security.surat2.history');
    Route::get('/security/filter', [SecurityController::class, 'filterHistory2'])->name('security.filter');
});
Route::middleware(['auth', 'role:7'])->group(function () {
    // Rute yang akan dilindungi oleh middleware role "admin pku"
    Route::get('/admin', [AdminPkuController::class, 'index'])->name('adminpku.dashboard');
    Route::get('/adminpku/surat2/{id}', [AdminPkuController::class, 'show'])->name('admin.surat2pku.show');
    Route::post('/adminpku/approve/{id}', [AdminPkuController::class, 'approve'])->name('adminpku.approve');
    Route::post('/adminpku/reject/{id}', [AdminPkuController::class, 'reject'])->name('adminpku.reject');
    Route::get('/persetujuanadminpku', [AdminPkuController::class, 'persetujuanadminpku'])->name('adminpku.persetujuan');
    Route::get('/historyadminpku', [AdminPkuController::class, 'historyadminpku'])->name('adminpku.history');
    Route::get('/adminpku/persetujuan/cari', [AdminPkuController::class, 'cari'])->name('adminpku.persetujuan.cari');
    Route::get('/adminpku/history/filter', [AdminPkuController::class, 'filterHistory'])->name('adminpku.history.filter');
    Route::get('/adminpku/history/{id}', [AdminPkuController::class, 'lihathistory2'])->name('adminpku.surat2.history');
});


// Rute untuk logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/redirect', [AuthController::class, 'redirectToProvider']);
Route::get('/google/callback', [AuthController::class, 'handleProviderCallback']);
