<?php

use App\Http\Livewire\Admin\AdminAddCompanyComponent;
use App\Http\Livewire\Admin\AdminAddEmployeesComponent;
use App\Http\Livewire\Admin\AdminAddTodosComponent;
use App\Http\Livewire\Admin\AdminCompanyComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCompanyComponent;
use App\Http\Livewire\Admin\AdminEditEmployeesComponent;
use App\Http\Livewire\Admin\AdminEditTodosComponent;
use App\Http\Livewire\Admin\AdminEmployeesComponent;
use App\Http\Livewire\Admin\AdminTodosComponent;
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

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/companies', AdminCompanyComponent::class)->name('admin.company');
    Route::get('admin/company/add', AdminAddCompanyComponent::class)->name('admin.add-company');
    Route::get('/admin/company/edit/{company_id}', AdminEditCompanyComponent::class)->name('admin.edit-company');

    Route::get('/admin/employees', AdminEmployeesComponent::class)->name('admin.employees');
    Route::get('/admin/employees/add', AdminAddEmployeesComponent::class)->name('admin.add-employee');
    Route::get('/admin/employees/edit/{employee_id}', AdminEditEmployeesComponent::class)->name('admin.edit-employee');

    Route::get('/admin/todos', AdminTodosComponent::class)->name('admin.todos');
    Route::get('/admin/todos/add', AdminAddTodosComponent::class)->name('admin.add-todo');
    Route::get('admin/todos/edit/{todo_id}', AdminEditTodosComponent::class)->name('admin.edit-todo');

});
