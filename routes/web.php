<?php

// use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\galerController;
use App\Http\Controllers\admin\kontenController;
use App\Http\Controllers\admin\pembayaranController;
use App\Http\Controllers\admin\programController;
// use App\Http\Controllers\admin\homeVoteController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\kandidat\kandidatController;
use App\Http\Controllers\landingpageController;
// use App\Http\Controllers\user\UserHomeController;
// use App\Http\Controllers\user\VoteController;
use App\Http\Middleware\AdminMiddleware;
// use App\Http\Middleware\KandidatMiddleware;
// use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Auth;

// Landing Page Route
Route::controller(landingpageController::class)->group(function() {
    Route::get('/', 'index')->name('/');
});

// Admin Routes with AdminMiddleware and Email Verification
Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function() {

        // Route::controller(AdminHomeController::class)->group(function() {
        //     Route::get('/homeKandidat', 'indexKandidat')->name('homeKandidat');
        //     Route::post('/kandidat/{id}/accept', [AdminHomeController::class, 'accept'])->name('kandidat.accept');
        //     Route::post('/kandidat/{id}/reject', [AdminHomeController::class, 'reject'])->name('kandidat.reject');

        // });

        // Program Controller Routes
        Route::controller(programController::class)->group(function() {
            Route::get('/program', 'programIndex')->name('program');
            Route::get('/program/addProgram', 'addProgram')->name('addProgram');
            Route::post('/simpanProgram', 'store')->name('programStore');
            Route::get('/editProgram/{id}/edit', 'editProgram')->name('editProgram');
            Route::put('/updateProgram/{id}', 'update')->name('updateProgram');
            Route::delete('/deleteProgram/{id}', 'destroy')->name('deleteProgram');
        });

        // Konten Controller Routes
        Route::controller(kontenController::class)->group(function() {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('/addKonten', 'addKonten')->name('addKonten');
            Route::post('/simpanKonten', 'store')->name('kontenStore');
            Route::get('/editKonten/{id}/edit', 'editKonten')->name('editKonten');
            Route::put('/updateKonten/{id}', 'update')->name('updateKonten');
            Route::delete('/deleteKonten/{id}', 'destroy')->name('deleteKonten');
        });

        // Galeri Controller Routes
        Route::controller(galerController::class)->group(function() {
            Route::get('/galeri', 'indexGaleri')->name('galeri');
            Route::get('/addGaleri', 'addGaleri')->name('addGaleri');
            Route::post('/simpanGaleri', 'store')->name('galeriStore');
            Route::get('/editGaleri/{id}', 'editGaleri')->name('editGaleri');
            Route::put('/updateGaleri/{id}', 'update')->name('updateGaleri');
            Route::delete('/deleteGaleri/{id}', 'destroy')->name('deleteGaleri');
        });

        // Pembayaran Controller Routes
        Route::controller(pembayaranController::class)->group(function() {
            Route::get('/pembayaran', 'index')->name('pembayaran');
            Route::get('/addPembayaran', 'addPembayaran')->name('addPembayaran');
            Route::post('/simpanPembayaran', 'store')->name('pembayaranStore');
            Route::get('/editPembayaran/{id}', 'edit')->name('editPembayaran');
            Route::put('/updatePembayaran/{id}', 'update')->name('updatePembayaran');
            Route::delete('/deletePembayaran/{id}', 'destroy')->name('deletePembayaran');
        });

        // Kandidat Controller Routes
        // Route::controller(kandidatController::class)->group(function() {
        //     Route::get('/kandidat', 'homeKandidat')->name('kandidat');
        //     Route::get('/addKandidat', 'addKandidat')->name('addKandidat');
        //     Route::post('/simpanKandidat', 'store')->name('kandidatStore');
        // });

        //Vote Controller Routes
        // Route::controller(homeVoteController::class)->group(function(){
        //     Route::get('/vote', 'homeVote')->name('homeVote');
        //     Route::get('/vote/winnwer','getWinner')->name('kandidatWinner');
        //     Route::post('/vote/winnwer/{id}','setWinner')->name('setWinner');
        // });
    });
});

// Route::prefix('user')->name('user.')->group(function() {
//     Route::middleware(['auth', 'verified', UserMiddleware::class])->group(function() {
//         Route::controller(UserHomeController::class)->group(function(){
//             Route::get('/dashboard', 'index')->name('dashboard');
//             Route::get('/kandidat', 'kandidat')->name('kandidat');
//         });
//         Route::controller(VoteController::class)->group(function(){
//             Route::get('/voteHome', 'voteHome')->name('voteHome');
//             Route::post('/Prosesvote/{id}/vote', 'vote')->name('Prosesvote');
//             Route::get('/vote/{id}/delete',  'deleteVote')->name('voteDelete');


//         });
//     });
// });
// Route::prefix('kandidat')->name('kandidat.')->group(function() {
//     Route::middleware(['auth', 'verified', KandidatMiddleware::class])->group(function() {
//         Route::controller(KandidatController::class)->group(function(){
//             Route::get('/dashboard', 'index')->name('dashboard');
//             Route::get('/daftar', 'addKandidat')->name('daftar');
//             Route::post('/simpanKandidat', 'store')->name('kandidatStore');
//             Route::get('/editKandidat/{id}', 'editKandidat')->name('editKandidat');
//             Route::put('/updateKandidat/{id}', 'update')->name('updatekandidat');
//         });
//     });
// });



// Authentication Routes with Email Verification enabled
Auth::routes(['verify' => true]);

// User Dashboard Route with UserMiddleware and Email Verification
Route::get('/dashboard', [HomeController::class, 'index']);
