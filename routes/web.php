<?php

use App\src\infrastructure\InvoiceController;
use App\src\infrastructure\InvoiceRepository;
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
    return view('welcome');
});

Route::get('/web/facturacion/facturas-impagadas', [ InvoiceController::class, 'retrieveTotalUnpaidInvoices' ])->name('getUnpaidInvoices');
