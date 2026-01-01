<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ActandRulesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('change-language/{locale}', [LanguageController::class, 'changeLanguage'])->name('change-language');


Route::middleware([App\Http\Middleware\SetLocale::class])->group(function () {

Route::get('/', [HomeController::class, 'homePage'])->name('home');

Route::get('/about_us', [AboutController::class, 'aboutusPage'])->name('about_us');
Route::get('/hclsc', [AboutController::class, 'hclscPage'])->name('hclsc');
Route::get('/members', [AboutController::class, 'membersPage'])->name('members');
Route::get('/north', [AboutController::class, 'northPage'])->name('north');
Route::get('/south', [AboutController::class, 'southPage'])->name('south');
Route::get('/bardez', [AboutController::class, 'bardezPage'])->name('bardez');
Route::get('/bicholim', [AboutController::class, 'bicholimPage'])->name('bicholim');
Route::get('/canacona', [AboutController::class, 'canaconaPage'])->name('canacona');
Route::get('/mormugao', [AboutController::class, 'mormugaoPage'])->name('mormugao');
Route::get('/pernem', [AboutController::class, 'pernemPage'])->name('pernem');
Route::get('/ponda', [AboutController::class, 'pondaPage'])->name('ponda');
Route::get('/quepem', [AboutController::class, 'quepemPage'])->name('quepem');
Route::get('/salcete', [AboutController::class, 'salcetePage'])->name('salcete');
Route::get('/sanguem', [AboutController::class, 'sanguemPage'])->name('sanguem');
Route::get('/sattari', [AboutController::class, 'sattariPage'])->name('sattari');
Route::get('/tiswadi', [AboutController::class, 'tiswadiPage'])->name('tiswadi');

Route::get('/legalaid', [ServicesController::class, 'legalaidPage'])->name('legalaid');
Route::get('/lokadalat', [ServicesController::class, 'lokadalatPage'])->name('lokadalat');
Route::get('/lokadalatschemes', [ServicesController::class, 'lokadalatschemesPage'])->name('lokadalatschemes');

Route::get('/the-legal-services-authorities-act-1987', [ActandRulesController::class, 'act1987Page'])->name('act1987');
Route::get('/rules', [ActandRulesController::class, 'rulesPage'])->name('rules');
Route::get('/regulations', [ActandRulesController::class, 'regulationsPage'])->name('regulations');
Route::get('/preventive&strategic-legal-services-schemes', [ActandRulesController::class, 'schemesPage'])->name('Schemes');
Route::get('/guidelines', [ActandRulesController::class, 'guidelinesPage'])->name('guidelines');

Route::get('/gallery', [GalleryController::class, 'galleryPage'])->name('gallery');
// Route to display a single event
Route::get('/gallery/event/{slug}', [GalleryController::class, 'eventPage'])->name('event.show');

Route::get('/latest_updates', [MiscellaneousController::class, 'latestupdatesPage'])->name('latest_updates');
Route::get('/newsletter', [MiscellaneousController::class, 'newsletterPage'])->name('newsletter');
Route::get('/recruitment', [MiscellaneousController::class, 'recruitmentPage'])->name('recruitment');

Route::get('/sitemap', function () {
    return view('gslsa.sitemap');
})->name('sitemap');

});