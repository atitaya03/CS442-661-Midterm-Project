<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\OrganizerController;
use App\Models\Organizer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role === 'OFFICER') {
            return redirect('/budgets');
        }
        return redirect('/events');
    } else {
        return redirect('/events');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registered', [HistoryController::class, 'register'])->name("historys.register");
Route::get('/certificate', [HistoryController::class, 'certificate'])->name("historys.certificate");

Route::get('/events', [EventController::class, 'index'])->name("event");
Route::get('/myevents/details', [EventController::class, 'getDetails'])->name("myevents.details");
Route::get('/myevents/applicants', [EventController::class, 'applicants'])->name("myevents.applicants");

Route::get('/myevents', [EventController::class, 'myEvent'])->name("myevents");
Route::get('/myevents/create-event', [EventController::class, 'createEvent'])->name("myevents.create-event");
Route::post('/myevents/getDistrict', [EventController::class, 'getDistrict'])->name("myevents.getDistrict");
Route::post('/myevents/getSubdistrict', [EventController::class, 'getSubdistrict'])->name("myevents.getSubdistrict");
Route::post('/myevents/storeEvent', [EventController::class, 'storeEvent'])->name("myevents.storeEvent");
Route::get('/myevents/boards',[EventController::class, 'boards'])->name("myevents.boards");
Route::get('/myevents/create-postit',[EventController::class, 'addPostit'])->name("myevents.create-postit");
Route::post('/myevents/storePostit', [EventController::class, 'storePostit'])->name("myevents.storePostit");

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/application', [ApplicationController::class, 'form'])->name('application.form');
Route::post('/events/{event}/application', [ApplicationController::class, 'store'])->name('application.store');

Route::get('/myorgs', [OrganizerController::class, 'myOrg'])->name("myorgs.myorgs");
Route::get('/myorgs/create-orgs', [OrganizerController::class, 'createOrgs'])->name("myorgs.create-orgs");
Route::post('/myorgs/storeOrgs', [OrganizerController::class, 'storeOrg'])->name("myorgs.storeOrgs");
Route::post('/myorgs/addmember', [OrganizerController::class, 'addMember'])->name("myorgs.orgs-member");

Route::get('/verify', function () { return view('events.verify');});

//Route::get('/boards', [BoardController::class,'index'])->name("board");
Route::get('/boards/teams', [BoardController::class, 'viewTeamBoard'])->name("board.team");

Route::get('/teams', [TeamController::class, 'index'])->name("team");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'uploadImage'])->name('profile.uploadImage');
    });

Route::middleware(['can:viewAny,App\Models\Budget'])->group(function () {
    Route::get('/budgets/{status?}', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/detail/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::put('/budgets/detail/{budget}/update-status', [BudgetController::class, 'updateStatus'])->name('budgets.update-status');
});

;
require __DIR__.'/auth.php';
