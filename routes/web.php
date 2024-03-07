<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;


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

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);

route::get('/view_kategorije',[AdminController::class,'view_kategorije']);

route::post('/add_kategorije',[AdminController::class,'add_kategorije']);

route::get('/izbriši_kategorije/{id}',[AdminController::class,'izbriši_kategorije']);

route::get('/view_proizvodi',[AdminController::class,'view_proizvodi']);

route::post('/add_proizvodi',[AdminController::class,'add_proizvodi']);

route::get('/prikazi_proizvodi',[AdminController::class,'prikazi_proizvodi']);

route::get('/izbrisi_proizvodi/{id}',[AdminController::class,'izbrisi_proizvodi']);

route::get('/uredi_proizvodi/{id}',[AdminController::class,'uredi_proizvodi']);

route::post('/uredi_proizvodi_potvrdi/{id}',[AdminController::class,'uredi_proizvodi_potvrdi']);

route::get('/narudzba',[AdminController::class,'narudzba']);

route::get('/isporuceno/{id}',[AdminController::class,'isporuceno']);







route::get('/vise_o_proizvodi/{id}',[HomeController::class,'vise_o_proizvodi']);

route::post('/dodaj_kosaricu/{id}',[HomeController::class,'dodaj_kosaricu']);

route::get('/prikazi_kosaricu',[HomeController::class,'prikazi_kosaricu']);

route::get('/ukloni_kosaricu/{id}',[HomeController::class,'ukloni_kosaricu']);

route::get('/placanje_preuzimanjem',[HomeController::class,'placanje_preuzimanjem']);

route::get('/trazi_proizvode',[HomeController::class,'trazi_proizvode']);

route::get('/proizvode',[HomeController::class,'proizvode']);

route::get('/proizvode_trazi',[HomeController::class,'proizvode_trazi']);

route::get('/kontakt',[HomeController::class,'kontakt']);

route::get('/o_nama',[HomeController::class,'o_nama']);




