<?php

use App\Http\Controllers\Admin\BaskaninMesajiController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DuyuruController;
use App\Http\Controllers\Admin\EtkinlikController;
use App\Http\Controllers\Admin\FaliyetController;
use App\Http\Controllers\Admin\FaliyetRaporController;
use App\Http\Controllers\Admin\HaberController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IhracatController;
use App\Http\Controllers\Admin\IhracatRakamController;
use App\Http\Controllers\Admin\InovasyonController;
use App\Http\Controllers\Admin\SayfalarController;
use App\Http\Controllers\Admin\SektorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SunumController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Artisan;
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
//cache temizleme
Route::get('/reset', function () {
    Artisan::call('config:cache');

    Artisan::call('cache:clear');

});



Route::get('lang/{locale}', [HomeController::class, 'setlocale'])->name('setlocale');
Route::group(['middleware' => 'setlocale'], function () {


    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/sektor-detail/{sektor}', [MainController::class, 'sektordetail'])->name('sektordetail');
    Route::get('/hakkimizda', [MainController::class, 'hakkimizda'])->name('hakkimizda');
    Route::get('/iletisim', [MainController::class, 'iletisim'])->name('iletisim');
    Route::post('/iletisim', [MainController::class, 'iletisim_gonder'])->name('iletisim_gonder');
    Route::get('/yonetim-kurulu', [MainController::class, 'yonetimkurulu'])->name('yonetimkurulu');
    Route::get('/idari-kadro', [MainController::class, 'idarikadro'])->name('idarikadro');
    Route::get('/raporlar', [MainController::class, 'raporlar'])->name('raporlar');
    Route::get('/sunumlar', [MainController::class, 'sunumlar'])->name('sunumlar');
    Route::get('/ihracat', [MainController::class, 'ihracat'])->name('ihracat');
    Route::get('/ihracat-radari', [MainController::class, 'ihracatrota'])->name('ihracatrota');
    Route::get('/uyelik', [MainController::class, 'uyelik'])->name('uyelik');
    Route::get('/devlet-destegi', [MainController::class, 'devletdestek'])->name('devletdestek');
    Route::get('/ihracat-raporlari', [MainController::class, 'ihracatrapor'])->name('ihracatrapor');
    Route::get('/faydali-linkler', [MainController::class, 'faydalilinkler'])->name('faydalilinkler');
    Route::get('/etkinlikler', [MainController::class, 'etkinlik'])->name('etkinlik');
    Route::get('/faaliyet/{faaliyet}', [MainController::class, 'faaliyet'])->name('faaliyet');
    Route::get('/haber/{haber}', [MainController::class, 'haber'])->name('haber');
    Route::get('/yarismalar', [MainController::class, 'yarisma'])->name('yarisma');
    Route::get('/inovasyon/{inovasyon}', [MainController::class, 'inovasyon'])->name('inovasyon');
    Route::get('/baskanin-mesaji', [MainController::class, 'baskanmesaj'])->name('baskanmesaj');
    Route::get('/haberler', [MainController::class, 'haberler'])->name('haberler');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

        Route::get('/', [HomeController::class, 'index'])->name('dashboard');
        Route::get('/form/create', [HomeController::class, 'form_create'])->name('form.create');
        Route::get('/form', [HomeController::class, 'form_index'])->name('form.index');


        Route::group(['prefix' => 'slider', 'as' => 'slider.', 'middleware' => 'auth'], function () {
            Route::get('/', [SliderController::class, 'index'])->name('index');
            Route::get('/create', [SliderController::class, 'create'])->name('create');
            Route::get('/edit/{slider}', [SliderController::class, 'edit'])->name('edit');
            Route::get('/destroy/{slider}', [SliderController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{slider}', [SliderController::class, 'update'])->name('update');
            Route::post('/create', [SliderController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'duyuru', 'as' => 'duyuru.', 'middleware' => 'auth'], function () {
            Route::get('/', [DuyuruController::class, 'index'])->name('index');
            Route::get('/create', [DuyuruController::class, 'create'])->name('create');
            Route::get('/edit/{duyuru}', [DuyuruController::class, 'edit'])->name('edit');
            Route::get('/destroy/{duyuru}', [DuyuruController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{duyuru}', [DuyuruController::class, 'update'])->name('update');
            Route::post('/sira/{duyuru}', [DuyuruController::class, 'sira'])->name('sira');
            Route::post('/create', [DuyuruController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'haber', 'as' => 'haber.', 'middleware' => 'auth'], function () {
            Route::get('/', [HaberController::class, 'index'])->name('index');
            Route::get('/create', [HaberController::class, 'create'])->name('create');
            Route::get('/edit/{haber}', [HaberController::class, 'edit'])->name('edit');
            Route::get('/destroy/{haber}', [HaberController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{haber}', [HaberController::class, 'update'])->name('update');
            Route::post('/create', [HaberController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'ihracatrakam', 'as' => 'ihracatrakam.', 'middleware' => 'auth'], function () {
            Route::get('/', [IhracatRakamController::class, 'index'])->name('index');
            Route::get('/create', [IhracatRakamController::class, 'create'])->name('create');
            Route::get('/edit/{ihracatRakam}', [IhracatRakamController::class, 'edit'])->name('edit');
            Route::get('/destroy/{ihracatRakam}', [IhracatRakamController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{ihracatRakam}', [IhracatRakamController::class, 'update'])->name('update');
            Route::post('/create', [IhracatRakamController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'sektor', 'as' => 'sektor.', 'middleware' => 'auth'], function () {
            Route::get('/', [SektorController::class, 'index'])->name('index');
            Route::get('/create', [SektorController::class, 'create'])->name('create');
            Route::get('/edit/{sektor}', [SektorController::class, 'edit'])->name('edit');
            Route::get('/destroy/{sektor}', [SektorController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{sektor}', [SektorController::class, 'update'])->name('update');
            Route::post('/create', [SektorController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'ihracat', 'as' => 'ihracat.', 'middleware' => 'auth'], function () {
            Route::get('/', [IhracatController::class, 'index'])->name('index');
            Route::get('/create', [IhracatController::class, 'create'])->name('create');
            Route::get('/edit/{ihracat}', [IhracatController::class, 'edit'])->name('edit');
            Route::get('/destroy/{ihracat}', [IhracatController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{ihracat}', [IhracatController::class, 'update'])->name('update');
            Route::post('/create', [IhracatController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'sunum', 'as' => 'sunum.', 'middleware' => 'auth'], function () {
            Route::get('/', [SunumController::class, 'index'])->name('index');
            Route::get('/create', [SunumController::class, 'create'])->name('create');
            Route::get('/edit/{sunum}', [SunumController::class, 'edit'])->name('edit');
            Route::get('/destroy/{sunum}', [SunumController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{sunum}', [SunumController::class, 'update'])->name('update');
            Route::post('/create', [SunumController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'faliyet', 'as' => 'faliyet.', 'middleware' => 'auth'], function () {
            Route::get('/', [FaliyetController::class, 'index'])->name('index');
            Route::get('/create', [FaliyetController::class, 'create'])->name('create');
            Route::get('/edit/{faliyet}', [FaliyetController::class, 'edit'])->name('edit');
            Route::get('/destroy/{faliyet}', [FaliyetController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{faliyet}', [FaliyetController::class, 'update'])->name('update');
            Route::post('/create', [FaliyetController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'etkinlik', 'as' => 'etkinlik.', 'middleware' => 'auth'], function () {
            Route::get('/', [EtkinlikController::class, 'index'])->name('index');
            Route::get('/create', [EtkinlikController::class, 'create'])->name('create');
            Route::get('/edit/{etkinlik}', [EtkinlikController::class, 'edit'])->name('edit');
            Route::get('/destroy/{etkinlik}', [EtkinlikController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{etkinlik}', [EtkinlikController::class, 'update'])->name('update');
            Route::post('/create', [EtkinlikController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'inovasyon', 'as' => 'inovasyon.', 'middleware' => 'auth'], function () {
            Route::get('/', [InovasyonController::class, 'index'])->name('index');
            Route::get('/create', [InovasyonController::class, 'create'])->name('create');
            Route::get('/edit/{inovasyon}', [InovasyonController::class, 'edit'])->name('edit');
            Route::get('/destroy/{inovasyon}', [InovasyonController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{inovasyon}', [InovasyonController::class, 'update'])->name('update');
            Route::post('/create', [InovasyonController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'faliyetrapor', 'as' => 'faliyetrapor.', 'middleware' => 'auth'], function () {
            Route::get('/', [FaliyetRaporController::class, 'index'])->name('index');
            Route::get('/create', [FaliyetRaporController::class, 'create'])->name('create');
            Route::get('/edit/{faliyetRapor}', [FaliyetRaporController::class, 'edit'])->name('edit');
            Route::get('/destroy/{faliyetRapor}', [FaliyetRaporController::class, 'destroy'])->name('destroy');
            Route::post('/edit/{faliyetRapor}', [FaliyetRaporController::class, 'update'])->name('update');
            Route::post('/create', [FaliyetRaporController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'baskaninmesaji', 'as' => 'baskaninmesaji.', 'middleware' => 'auth'], function () {
            Route::get('/edit/', [BaskaninMesajiController::class, 'edit'])->name('edit');
            Route::post('/edit/{baskaninmesaji}', [BaskaninMesajiController::class, 'update'])->name('update');
        });


        Route::group(['prefix' => 'page', 'as' => 'sayfalar.', 'middleware' => 'auth'], function () {

            Route::group(['prefix' => 'hakkimizda'], function () {
                Route::get('/', [SayfalarController::class, 'hakkimizda'])->name('hakkimizda');
                Route::post('/{hakkimizda}', [SayfalarController::class, 'hakkimizda_update'])->name('hakkimizda.update');
            });
            Route::group(['prefix' => 'ihracatrotasi'], function () {
                Route::get('/', [SayfalarController::class, 'ihracatrotasi'])->name('ihracatrotasi');
                Route::post('/{ihracatrotasi}', [SayfalarController::class, 'ihracatrotasi_update'])->name('ihracatrotasi.update');
            });

            Route::group(['prefix' => 'devletdestegi'], function () {
                Route::get('/', [SayfalarController::class, 'devletdestegi'])->name('devletdestegi');
                Route::post('/{devletdestegi}', [SayfalarController::class, 'devletdestegi_update'])->name('devletdestegi.update');
            });

            Route::group(['prefix' => 'kadro'], function () {
                Route::get('/', [SayfalarController::class, 'kadro_index'])->name('kadro_index');
                Route::get('/create', [SayfalarController::class, 'kadro_create'])->name('kadro_create');
                Route::get('/edit/{kadro}', [SayfalarController::class, 'kadro_edit'])->name('kadro_edit');
                Route::get('/edit2/{kadro}', [SayfalarController::class, 'kadro_edit2'])->name('kadro_edit2');
                Route::get('/destroy/{kadro}', [SayfalarController::class, 'kadro_destroy'])->name('kadro_destroy');
                Route::post('/edit/{kadro}', [SayfalarController::class, 'kadro_update'])->name('kadro_update');
                Route::post('/sira/{kadro}', [SayfalarController::class, 'kadro_sira'])->name('kadro_sira');
                Route::post('/create', [SayfalarController::class, 'kadro_store'])->name('kadro_store');
            });

//            Route::group(['prefix' => 'ihracat'], function () {
//                Route::get('/', [SayfalarController::class, 'ihracatPage'])->name('ihracatPage');
//                Route::post('/{ihracatPage}', [SayfalarController::class, 'ihracatPage_update'])->name('ihracatPage.update');
//            });

        });
//        Route::group(['prefix'=>'model','as'=>'model.','middleware'=>'auth'],function (){
//            Route::get('/', [TypeController::class, 'index'])->name('index');
//            Route::get('/create', [TypeController::class, 'create'])->name('create');
//            Route::get('/edit/{type}', [TypeController::class, 'edit'])->name('edit');
//            Route::get('/destroy/{type}', [TypeController::class, 'destroy'])->name('destroy');
//            Route::post('/edit/{type}', [TypeController::class, 'update'])->name('update');
//            Route::post('/create', [TypeController::class, 'store'])->name('store');
//        });
//        Route::group(['prefix'=>'product','as'=>'product.','middleware'=>'auth'],function (){
//            Route::get('/', [ProductController::class, 'index'])->name('index');
//            Route::get('/create', [ProductController::class, 'create'])->name('create');
//            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
//            Route::get('/destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');
//            Route::post('/edit/{product}', [ProductController::class, 'update'])->name('update');
//            Route::post('/create', [ProductController::class, 'store'])->name('store');
//        });

    });


});


require __DIR__ . '/auth.php';
