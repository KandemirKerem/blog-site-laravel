<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VerifyController;
use App\Livewire\Blogs;
use Illuminate\Support\Facades\Route;




//Homepage
Route::get('/',[PostController::class,'homepagePosts'])->name('homepage');

//Blogs

// // For Authorized Users
Route::middleware(['auth','verified'])->group( function () {
Route::get('/blogs/create', [PostController::class,'create'])->name('blogs.create');
Route::post('/dashboard',[PostController::class,'store'])->name('blogs.store');
Route::get('/blogs/{post:slug}/edit',[PostController::class,'edit'])->name('blogs.edit');
Route::patch('/blogs/{post:slug}',[PostController::class,'update'])->name('blogs.update');
Route::delete('/blogs/{post:slug}',[PostController::class,'destroy'])->name('blogs.delete');
});
// // Public
Route::get('/blogs' , Blogs::class )->name('blogs.index');
Route::get('/blogs/{post:slug}',[PostController::class,'show'])->name('blogs.show');


//Session
Route::get('/login',[SessionController::class,'create'])->name('login');

Route::post('/login',[SessionController::class,'store'])
    ->middleware('throttle:6,1')
    ->name('login.store');

Route::post('/logout',[SessionController::class,'destroy'])->name('logout');

// Auth
Route::get('/register',[AuthController::class , 'create'])->name('register');
Route::post('/register',[AuthController::class , 'store'])->name('register.store');


//Verify Email
// 1. Mail Onaylatma uyarısı sayfası
Route::get('/email/verify', [VerifyController::class,'notice'])
    ->middleware('auth')
    ->name('verification.notice');

// 2. Maildeki linke tıklandığında doğrulama yapan rota
Route::get('/email/verify/{id}/{hash}', [VerifyController::class , 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

// 3. Onay mailini tekrar gönderme butonu için
Route::post('/email/verification-notification', [VerifyController::class , 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');


//Profile
Route::middleware(['auth'])->group( function () {
Route::get('/profile',[ProfileController::class,'profile'])->name('profile');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});

//Others
Route::view('/dashboard','pages.dashboard')
    ->middleware('auth')->name('dashboard.view');

Route::view('/about-contact','pages.about-contact')
->name('about.contact');

Route::view('/terms','pages.terms')
->name('terms');

Route::post('/contactmail',[MailController::class,'contactmail'])
    ->name('contactmail')
//    ->middleware('throttle:3,1')
;


