<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AboutBardezMembersController;
use App\Http\Controllers\AboutBicholimMembersController;
use App\Http\Controllers\AboutCanaconaMembersController;
use App\Http\Controllers\AboutHclscMembersController;
use App\Http\Controllers\AboutMembersController;
use App\Http\Controllers\AboutMormugaoMembersController;
use App\Http\Controllers\AboutNorthMembersController;
use App\Http\Controllers\AboutPernemMembersController;
use App\Http\Controllers\AboutPondaMembersController;
use App\Http\Controllers\AboutQuepemMembersController;
use App\Http\Controllers\AboutSalceteMembersController;
use App\Http\Controllers\AboutSanguemMembersController;
use App\Http\Controllers\AboutSattariMembersController;
use App\Http\Controllers\AboutSouthMembersController;
use App\Http\Controllers\AboutTiswadiMembersController;
use App\Http\Controllers\GalleryEventController;
use App\Http\Controllers\HomeNoticesController;
use App\Http\Controllers\HomeYoutubeVideosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MiscellaneousNewsletterController;
use App\Http\Controllers\MiscellaneousRecruitmentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServicesLegalheirController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::delete('/register/user/{user}', [RegisterController::class, 'userDelete'])->name('userDelete');
Route::get('register/user/{user}/edit', [RegisterController::class, 'editUser'])->name('userEdit');
Route::put('register/user/{user}/update', [RegisterController::class, 'updateUser'])->name('userUpdate');

Route::middleware(['auth'])->group(function () {

    Route::get('change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');

    Route::get('/', function () {
        return view('gslsa.dash_landing');
    })->name('dashboard');

    Route::resource('/GslsaYoutubeVideos', HomeYoutubeVideosController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaYoutubeVideos.index',
            'store'   => 'GslsaYoutubeVideos.store',
            'edit'    => 'GslsaYoutubeVideos.edit',
            'update'  => 'GslsaYoutubeVideos.update',
            'destroy' => 'GslsaYoutubeVideos.destroy'
        ]);

    Route::resource('/GslsaNotices', HomeNoticesController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaNotices.index',
            'store'   => 'GslsaNotices.store',
            'edit'    => 'GslsaNotices.edit',
            'update'  => 'GslsaNotices.update',
            'destroy' => 'GslsaNotices.destroy'
        ]);

    Route::resource('/GslsaMembers', AboutMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaMembers.index',
            'store'   => 'GslsaMembers.store',
            'edit'    => 'GslsaMembers.edit',
            'update'  => 'GslsaMembers.update',
            'destroy' => 'GslsaMembers.destroy'
        ]);

    Route::resource('/GslsaHclscMembers', AboutHclscMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaHclscMembers.index',
            'store'   => 'GslsaHclscMembers.store',
            'edit'    => 'GslsaHclscMembers.edit',
            'update'  => 'GslsaHclscMembers.update',
            'destroy' => 'GslsaHclscMembers.destroy'
        ]);

    Route::resource('/GslsaNorthMembers', AboutNorthMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaNorthMembers.index',
            'store'   => 'GslsaNorthMembers.store',
            'edit'    => 'GslsaNorthMembers.edit',
            'update'  => 'GslsaNorthMembers.update',
            'destroy' => 'GslsaNorthMembers.destroy'
        ]);

    Route::resource('/GslsaSouthMembers', AboutSouthMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaSouthMembers.index',
            'store'   => 'GslsaSouthMembers.store',
            'edit'    => 'GslsaSouthMembers.edit',
            'update'  => 'GslsaSouthMembers.update',
            'destroy' => 'GslsaSouthMembers.destroy'
        ]);

    Route::resource('/GslsaBardezMembers', AboutBardezMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaBardezMembers.index',
            'store'   => 'GslsaBardezMembers.store',
            'edit'    => 'GslsaBardezMembers.edit',
            'update'  => 'GslsaBardezMembers.update',
            'destroy' => 'GslsaBardezMembers.destroy'
        ]);

    Route::resource('/GslsaBicholimMembers', AboutBicholimMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaBicholimMembers.index',
            'store'   => 'GslsaBicholimMembers.store',
            'edit'    => 'GslsaBicholimMembers.edit',
            'update'  => 'GslsaBicholimMembers.update',
            'destroy' => 'GslsaBicholimMembers.destroy'
        ]);

    Route::resource('/GslsaCanaconaMembers', AboutCanaconaMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaCanaconaMembers.index',
            'store'   => 'GslsaCanaconaMembers.store',
            'edit'    => 'GslsaCanaconaMembers.edit',
            'update'  => 'GslsaCanaconaMembers.update',
            'destroy' => 'GslsaCanaconaMembers.destroy'
        ]);

    Route::resource('/GslsaMormugaoMembers', AboutMormugaoMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaMormugaoMembers.index',
            'store'   => 'GslsaMormugaoMembers.store',
            'edit'    => 'GslsaMormugaoMembers.edit',
            'update'  => 'GslsaMormugaoMembers.update',
            'destroy' => 'GslsaMormugaoMembers.destroy'
        ]);

    Route::resource('/GslsaPernemMembers', AboutPernemMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaPernemMembers.index',
            'store'   => 'GslsaPernemMembers.store',
            'edit'    => 'GslsaPernemMembers.edit',
            'update'  => 'GslsaPernemMembers.update',
            'destroy' => 'GslsaPernemMembers.destroy'
        ]);

    Route::resource('/GslsaPondaMembers', AboutPondaMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaPondaMembers.index',
            'store'   => 'GslsaPondaMembers.store',
            'edit'    => 'GslsaPondaMembers.edit',
            'update'  => 'GslsaPondaMembers.update',
            'destroy' => 'GslsaPondaMembers.destroy'
        ]);

    Route::resource('/GslsaQuepemMembers', AboutQuepemMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaQuepemMembers.index',
            'store'   => 'GslsaQuepemMembers.store',
            'edit'    => 'GslsaQuepemMembers.edit',
            'update'  => 'GslsaQuepemMembers.update',
            'destroy' => 'GslsaQuepemMembers.destroy'
        ]);

    Route::resource('/GslsaSalceteMembers', AboutSalceteMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaSalceteMembers.index',
            'store'   => 'GslsaSalceteMembers.store',
            'edit'    => 'GslsaSalceteMembers.edit',
            'update'  => 'GslsaSalceteMembers.update',
            'destroy' => 'GslsaSalceteMembers.destroy'
        ]);

    Route::resource('/GslsaSanguemMembers', AboutSanguemMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaSanguemMembers.index',
            'store'   => 'GslsaSanguemMembers.store',
            'edit'    => 'GslsaSanguemMembers.edit',
            'update'  => 'GslsaSanguemMembers.update',
            'destroy' => 'GslsaSanguemMembers.destroy'
        ]);

    Route::resource('/GslsaSattariMembers', AboutSattariMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaSattariMembers.index',
            'store'   => 'GslsaSattariMembers.store',
            'edit'    => 'GslsaSattariMembers.edit',
            'update'  => 'GslsaSattariMembers.update',
            'destroy' => 'GslsaSattariMembers.destroy'
        ]);

    Route::resource('/GslsaTiswadiMembers', AboutTiswadiMembersController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaTiswadiMembers.index',
            'store'   => 'GslsaTiswadiMembers.store',
            'edit'    => 'GslsaTiswadiMembers.edit',
            'update'  => 'GslsaTiswadiMembers.update',
            'destroy' => 'GslsaTiswadiMembers.destroy'
        ]);

    Route::resource('/GslsaRecruitments', MiscellaneousRecruitmentController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaRecruitments.index',
            'store'   => 'GslsaRecruitments.store',
            'edit'    => 'GslsaRecruitments.edit',
            'update'  => 'GslsaRecruitments.update',
            'destroy' => 'GslsaRecruitments.destroy'
        ]);

    Route::resource('/GslsaNewsletters', MiscellaneousNewsletterController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaNewsletters.index',
            'store'   => 'GslsaNewsletters.store',
            'edit'    => 'GslsaNewsletters.edit',
            'update'  => 'GslsaNewsletters.update',
            'destroy' => 'GslsaNewsletters.destroy'
        ]);

    Route::resource('/GslsaLegalheirs', ServicesLegalheirController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaLegalheirs.index',
            'store'   => 'GslsaLegalheirs.store',
            'edit'    => 'GslsaLegalheirs.edit',
            'update'  => 'GslsaLegalheirs.update',
            'destroy' => 'GslsaLegalheirs.destroy'
        ]);

    Route::resource('/GslsaEvents', GalleryEventController::class)
        ->only(['index', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'   => 'GslsaEvents.index',
            'store'   => 'GslsaEvents.store',
            'edit'    => 'GslsaEvents.edit',
            'update'  => 'GslsaEvents.update',
            'destroy' => 'GslsaEvents.destroy'
        ]);
});
