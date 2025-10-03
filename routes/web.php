<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\Doctor\Index as Doctor;
use App\Http\Livewire\Paciente\Index as Paciente;
use App\Http\Livewire\Citas\Index as Citas;
use App\Http\Livewire\Ingresar\Index as Ingresar;

use App\Http\Livewire\AdminDashboar\Index as AdminDashboard;

use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\usuario\Index as Usuario;

use Illuminate\Http\Request;

Route::get('/', function() {
    return redirect('/login');
})->name('principal');
Route::get('/logout', function() {Auth::logout(); return redirect('/login'); })->name('logout');

Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/ingresar', Ingresar::class)->name('ingresar');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/admin/dashboard', AdminDashboard::class)->middleware(['role:admin'])->name('admin.dashboard');
    Route::get('/doctor', Doctor::class)->name('doctor');
    Route::get('/paciente', Paciente::class)->name('paciente');
    Route::get('/citas', Citas::class)->name('citas');
    // Route::get('/paciente', Paciente::class)->middleware(['role:doctor'])->name('paciente');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/usuarios', Usuario::class)->name('usuarios');
});

