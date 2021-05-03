<?php
use App\Http\Controllers\TestController;
// use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/get-id/{id}',function($id){
   return $id;
})->name('a');

Route::get('/get-string/{id?}',function(){
    return 'welcome';
 })->name('b');

//  Route::namespace('Front')->group(function(){
//     Route::get('UserS',[UserController::class, 'showAdmin']);
// });

// Route::get('/user', [TestController::class, 'show']);

Route::middleware(['auth'])->prefix('users')->group(function () {
    // Route::get('/user', function () {
        Route::get('show', [TestController::class, 'show']);
        Route::get('update', [TestController::class, 'update']);
        Route::get('delete', [TestController::class, 'delete']);
        Route::get('add', [TestController::class, 'add']);

});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/redirect/facebook', [App\Http\Controllers\SocialController::class, 'redirect']);
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
Route::group(['prefix' => 'offers'],function (){
        Route::get('create',[App\Http\Controllers\CrudController::class,'create']);
        Route::Post('store',[App\Http\Controllers\CrudController::class,'store'])->name('offres.store');
        Route::get('show',[App\Http\Controllers\CrudController::class,'showOffers']);
        Route::get('edit/{offer_id}',[App\Http\Controllers\CrudController::class,'editOffers'])->name('offers.edit');
        Route::Post('update/{offer_id}',[App\Http\Controllers\CrudController::class,'store'])->name('offres.update');
    });
});

