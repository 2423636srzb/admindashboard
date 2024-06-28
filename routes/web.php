<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-error', function () {
    // Simulate an error
    throw new Exception('This is a test critical error.');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:Admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('backups', [BackupController::class,'index'])->name('backups.index');
    Route::get('backups/create', [BackupController::class,'create'])->name('backups.create');
    Route::get('backups/download/{filename}', [BackupController::class,'download'])->name('backups.download');
    Route::get('backups/delete/{filename}', [BackupController::class,'delete'])->name('backups.delete');


Route::get('/admin/notifications', [AdminController::class, 'showNotifications'])->name('notifications');
Route::post('/admin/notifications/mark-as-read/{id}', [AdminController::class, 'markAsRead'])->name('notifications.read');
Route::post('/admin/notifications/mark-as-unread/{id}', [AdminController::class, 'markAsUnread'])->name('notifications.unread');

Route::get('/admin/criticalError', [AdminController::class, 'criticalError'])->name('criticalError');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/dashboard',[AdminController::class,'index'])->name('index');

Route::resource('/roles',RoleController::class);
Route::post('roles/{role}/permission',[RoleController::class,'givePermission'])->name('roles.permission');
Route::delete('roles/{role}/permission/{permission}',[RoleController::class,'revokePermission'])->name('roles.permission.revoke');
Route::resource('/permissions',PermissionController::class);
Route::get('/users',[UserController::class,'index'])->name('user.index');
Route::get('/users/edit/{user}',[UserController::class,'show'])->name('user.show');
Route::post('/user/{user}/roles',[UserController::class,'assignRoles'])->name('user.roles');
Route::delete('/user/{user}/roles/{role}',[UserController::class,'removeRoles'])->name('user.roles.remove');
Route::get('/delete/user/{user}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('/site/setting',[SettingController::class,'index'])->name('site.setting.index');
Route::post('/site/setting',[SettingController::class,'store'])->name('site.setting.store');

Route::get('/smtp/setting',[SettingController::class,'smtpSetting'])->name('smtp.setting.index');
Route::post('/smtp/setting',[SettingController::class,'smtpUpdate'])->name('smtp.setting.update');

Route::get('/email/create',[SettingController::class,'emailCreate'])->name('email.create');
Route::post('/email/send',[SettingController::class,'emailSend'])->name('email.send');

Route::resource('api_keys', ApiKeyController::class);

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('posts', PostsController::class);

Route::get('ActivityLog',[ActivityLogController::class,'index'])->name('activity.report');
Route::get('/system-logs',[ActivityLogController::class,'getSystemLogs'])->name('system.logs');
});

Route::middleware('auth')->group(function () {
 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('files',FileController::class);
require __DIR__.'/auth.php';


