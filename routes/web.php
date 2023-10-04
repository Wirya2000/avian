<?php

use App\Http\Controllers\TableAController;
use App\Http\Controllers\TableBController;
use App\Http\Controllers\TableCController;
use App\Http\Controllers\TableDController;
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
    return view('dashboard.home');
});

// Route::post('/table_b/{kode_toko}/edit', [TableBController::class, 'edit']);

// Route::get('/table_a/file-import',[TableAController::class, 'importView'])->name('table_a.import-view');
Route::post('/table_a/import',[TableAController::class, 'import'])->name('table_a.import');
Route::get('/table_a/export',[TableAController::class, 'export'])->name('table_a.export');
Route::get('/table_a/print_pdf', [TableAController::class, 'printPDF'])->name('table_a.exportPDF');

Route::post('/table_b/import',[TableBController::class, 'import'])->name('table_b.import');
Route::get('/table_b/export',[TableBController::class, 'export'])->name('table_b.export');
Route::get('/table_b/print_pdf', [TableBController::class, 'printPDF'])->name('table_b.exportPDF');

Route::post('/table_c/import',[TableCController::class, 'import'])->name('table_c.import');
Route::get('/table_c/export',[TableCController::class, 'export'])->name('table_c.export');
Route::get('/table_c/print_pdf', [TableCController::class, 'printPDF'])->name('table_c.exportPDF');

Route::post('/table_d/import',[TableDController::class, 'import'])->name('table_d.import');
Route::get('/table_d/export',[TableDController::class, 'export'])->name('table_d.export');
Route::get('/table_d/print_pdf', [TableDController::class, 'printPDF'])->name('table_d.exportPDF');

Route::resource('/table_a', TableAController::class);
Route::resource('/table_b', TableBController::class);
Route::resource('/table_c', TableCController::class);
Route::resource('/table_d', TableDController::class);
