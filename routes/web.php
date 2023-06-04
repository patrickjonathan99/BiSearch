<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewRecruitmentController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/d', function () {
    return view('homeDsn');
});

Route::get('/f', function () {
    return view('BDForumMhs');
});

Route::get('/l', function () {
    return view('login');
});

Route::get('/s', function () {
    return view('signup');
});

Route::get('/nf', function () {
    return view('newFormRecruit');
});

Route::get('/his', function () {
    return view('history');
});

Route::get('/forum', [ForumController::class, 'forum'])->middleware('student.auth');
Route::get('/myforum', [ForumController::class, 'myforum'])->middleware('lecturer.auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('student.auth');
Route::get('/editProfile', [ProfileController::class, 'editProfile']);
Route::put('/updateProfile', [ProfileController::class, 'updateProfile']);

Route::get('/forum/{id}', [ForumController::class, 'breakdown']);
Route::get('/forum/{id}/edit', [ForumController::class, 'editForum']);
Route::put('/updateForum', [ForumController::class, 'updateForum']);
Route::post('/comment', [ForumController::class, 'storeComment']);
Route::put('/updateComment', [ForumController::class, 'updateComment']);
Route::put('/accepted', [ForumController::class, 'acceptComment']);

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/newform', [NewRecruitmentController::class, 'index']);
Route::post('/newform', [NewRecruitmentController::class, 'store']);

Route::get('/history', [HistoryController::class, 'index']);
