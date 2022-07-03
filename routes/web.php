<?php

use App\Http\Controllers\BreederController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\UserController;


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', function (){
    return redirect()->route('login');
});

//*****************{ دسته بندی }***********************************//

//دسته بندی ها ----------------------------//
Route::get('category',[CategoryController::class, 'index'])->name('category')->middleware('dr');

//افزودن دسته بندی -------------------------------//
Route::post('add-category',[CategoryController::class, 'insert'])->name('add-category')->middleware('dr');

// ویرایش دسته بندی--------------------------------//
Route::get('edit-category/{category}',[CategoryController::class, 'edit'])->name('edit-category')->middleware('dr');

//بروز رسانی دسته بندی -----------------------------//
Route::put('update-category',[CategoryController::class, 'update'])->name('update-category')->middleware('dr');

// حذف سته بندی ----------------------------------//
Route::delete('destroy-category/{category}',[CategoryController::class, 'destroy'])->name('destroy-category')->middleware('dr');


/*
 *# روت های مرغ گوشتی #*
*/


//صفحات مرغداری و مرغ دار ها
Route::get('add-breeder', [BreederController::class, 'create'])->name('add-breeder')->middleware('dr');
Route::post('add-breeder', [BreederController::class, 'insert'])->name('insert-breeder')->middleware('dr');

//نمایش لیست مرغدار ها
Route::get('breeders', [BreederController::class, 'index'])->name('breeders')->middleware('auth');

//حذف یک مرغدار
Route::delete('destroy-breeder/{breeder}', [BreederController::class, 'destroy'])->name('destroy-breeders')->middleware('dr');

//ویرایش مشخصات مرغدار
Route::get('edit-breeder/{breeder}', [BreederController::class, 'edit'])->name('edit-breeders')->middleware('dr');

//بروزرسانی مرغدار
Route::put('update-breeder/{breeder}', [BreederController::class, 'update'])->name('update-breeder')->middleware('dr');

//صفحه افزودن فارم
Route::get('add-farm', [FarmController::class, 'create'])->name('add-farm')->middleware('dr');
Route::post('add-farm', [FarmController::class, 'insert'])->name('insert-farm')->middleware('dr');

//صفحه لیست فارم های ذخیره شده
Route::get('farms', [FarmController::class, 'index'])->name('farms')->middleware('dr');
Route::get('edit-farm/{farm}', [FarmController::class, 'edit'])->name('edit-farm')->middleware('dr');
Route::put('update-farm/{farm}', [FarmController::class, 'update'])->name('update-farm')->middleware('dr');
Route::delete('destroy-farm/{farm}', [FarmController::class, 'destroy'])->name('destroy-farms')->middleware('admin');


/*###################################################################################################################*/
//روت هار دامپزشک-----------------------------------------------------------//

Route::get('drs', [DrController::class, 'index'])->name('drs')->middleware('admin');
Route::get('add-dr', [DrController::class, 'add_dr'])->name('add-dr')->middleware('admin');
Route::post('create-dr', [DrController::class, 'create'])->name('create-dr')->middleware('admin');
Route::get('edit-dr/{dr}', [DrController::class, 'edit'])->name('edit-dr')->middleware('admin');
Route::put('update-dr/{dr}', [DrController::class, 'update'])->name('update-dr')->middleware('admin');
Route::delete('destroy-dr/{dr}', [DrController::class, 'destroy'])->name('destroy-dr')->middleware('admin');


//روت های کارشناس فارم-----------------------------------------------------------//
Route::get('experts', [ExpertController::class, 'index'])->name('experts')->middleware('dr');
Route::get('add-expert', [ExpertController::class, 'add_expert'])->name('add-expert')->middleware('dr');
Route::post('create-expert', [ExpertController::class, 'create'])->name('create-expert')->middleware('dr');
Route::get('edit-expert/{expert}', [ExpertController::class, 'edit'])->name('edit-expert')->middleware('dr');
Route::put('update-expert/{expert}', [ExpertController::class, 'update'])->name('update-expert')->middleware('dr');
Route::delete('destroy-expert/{expert}', [ExpertController::class, 'destroy'])->name('destroy-expert')->middleware('dr');

//شروع دوره جوجه ریزی------------------------------------------------------//
Route::get('periods', [PeriodController::class, 'show'])->name('periods')->middleware('auth');
Route::get('report-period/{tarikh_start}/{breeder}', [PeriodController::class, 'report'])->name('report-period')->middleware('auth');
Route::get('start-period', [PeriodController::class, 'index'])->name('add-period')->middleware('expert');
Route::get('end-period/{period?}', [PeriodController::class, 'end_period_index'])->name('end-period')->middleware('expert');
Route::get('end-periods', [PeriodController::class, 'end_periods'])->name('end-periods')->middleware('auth');
Route::post('create-period', [PeriodController::class, 'create'])->name('create-period')->middleware('expert');
Route::put('create-end-period', [PeriodController::class, 'create_end_period'])->name('create-end-period')->middleware('expert');
Route::put('undo-end-period/{period}', [PeriodController::class, 'undo_end_period'])->name('undo-end-period')->middleware('dr');
Route::get('edit-start-period/{period}', [PeriodController::class, 'editStart'])->name('edit-start-period')->middleware('dr');
Route::put('update-start-period/{period}', [PeriodController::class, 'update_start'])->name('update-start-period')->middleware('dr');
Route::delete('destroy-period/{period}', [PeriodController::class, 'destroy'])->name('destroy-period')->middleware('dr');

//گزارش روزانه------------------------------//
Route::delete('destroy-daily-report/{dailyReport}', [DailyReportController::class, 'destroy'])->name('destroy-daily-report')->middleware('dr');
Route::get('daily-reports/{tarikh_start?}/{breeder?}', [DailyReportController::class, 'index'])->name('daily-reports')->middleware('auth');
Route::get('add-daily-report/{dailyReport?}', [DailyReportController::class, 'add'])->name('add-daily-report')->middleware('expert');
Route::get('view-daily-report/{dailyReport}', [DailyReportController::class, 'show'])->name('view-daily-report')->middleware('auth');
Route::get('edit-daily-report/{dailyReport}', [DailyReportController::class, 'edit'])->name('edit-daily-report')->middleware('expert');
Route::post('add-daily-report', [DailyReportController::class, 'create'])->name('create-daily-report')->middleware('expert');
Route::put('update-daily-report/{dailyReport}', [DailyReportController::class, 'update'])->name('update-daily-report')->middleware('dr');


//کاربران---------------------------------------------//
Route::get('users',[UserController::class, 'users'])->name('users')->middleware('admin');
Route::get('add-user',[UserController::class, 'add_user'])->name('add-user')->middleware('admin');
Route::post('add-user',[UserController::class, 'create'])->name('create-user')->middleware('admin');
Route::get('edit-user/{user}',[UserController::class, 'edit'])->name('edit-user')->middleware('admin');
Route::delete('destroy-user/{user}',[UserController::class, 'destroy'])->name('destroy-user')->middleware('admin');
Route::put('update-user/{user}',[UserController::class, 'update'])->name('update-user')->middleware('admin');
