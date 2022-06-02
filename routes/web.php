<?php

use App\Http\Livewire\Students\StudentView;
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

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');


  Route::get('/students', function () {
    return view('students.students-shim');
  })->name('students.list');


  Route::get('/students/{student}', StudentView::class)
    ->name('students.view');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
  'role:admin'
])->group(function () {
  Route::get('/user-management', function () {
    return view('auth.users-shim');
  })->name('auth.user-management');
});


Route::get('/', function () {
  if (Auth::check()) {
    return redirect()->route('dashboard');
  } else {
    return redirect('login');
  }
});

if (env('APP_DEBUG')) {
  Route::get('generate', function () {
    // dd(\Illuminate\Support\Facades\Artisan::call('storage:link'));
    dd(Storage::files("/public/photos"));
  });

  // Also go through public giving permissions 755 or something
}
