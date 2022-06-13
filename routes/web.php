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


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/', function (){
    return redirect()->route('login');
});

//*****************{ دسته بندی }***********************************//

//دسته بندی ها ----------------------------//
Route::get('category',[CategoryController::class, 'index'])->name('category')->middleware('auth');

//افزودن دسته بندی -------------------------------//
Route::post('add-category',[CategoryController::class, 'insert'])->name('add-category')->middleware('auth');

// ویرایش دسته بندی--------------------------------//
Route::get('edit-category/{category}',[CategoryController::class, 'edit'])->name('edit-category')->middleware('auth');

//بروز رسانی دسته بندی -----------------------------//
Route::put('update-category',[CategoryController::class, 'update'])->name('update-category')->middleware('auth');

// حذف سته بندی ----------------------------------//
Route::delete('destroy-category/{category}',[CategoryController::class, 'destroy'])->name('destroy-category')->middleware('auth');


/*
 *# روت های مرغ گوشتی #*
*/


//صفحات مرغداری و مرغ دار ها
Route::get('add-breeder', [BreederController::class, 'create'])->name('add-breeder')->middleware('auth');
Route::post('add-breeder', [BreederController::class, 'insert'])->name('insert-breeder')->middleware('auth');

//نمایش لیست مرغدار ها
Route::get('breeders', [BreederController::class, 'index'])->name('breeders');

//حذف یک مرغدار
Route::delete('destroy-breeder/{breeder}', [BreederController::class, 'destroy'])->name('destroy-breeders')->middleware('auth');

//ویرایش مشخصات مرغدار
Route::get('edit-breeder/{breeder}', [BreederController::class, 'edit'])->name('edit-breeders')->middleware('auth');

//بروزرسانی مرغدار
Route::put('update-breeder/{breeder}', [BreederController::class, 'update'])->name('update-breeder')->middleware('auth');

//صفحه افزودن فارم
Route::get('add-farm', [FarmController::class, 'create'])->name('add-farm')->middleware('auth');
Route::post('add-farm', [FarmController::class, 'insert'])->name('insert-farm')->middleware('auth');

//صفحه لیست فارم های ذخیره شده
Route::get('farms', [FarmController::class, 'index'])->name('farms')->middleware('auth');
Route::get('edit-farm/{farm}', [FarmController::class, 'edit'])->name('edit-farm')->middleware('auth');
Route::put('update-farm/{farm}', [FarmController::class, 'update'])->name('update-farm')->middleware('auth');
Route::delete('destroy-farm/{farm}', [FarmController::class, 'destroy'])->name('destroy-farms')->middleware('auth');


/*###################################################################################################################*/
//روت هار دامپزشک-----------------------------------------------------------//

Route::get('drs', [DrController::class, 'index'])->name('drs')->middleware('auth');
Route::get('add-dr', [DrController::class, 'add_dr'])->name('add-dr')->middleware('auth');
Route::post('create-dr', [DrController::class, 'create'])->name('create-dr')->middleware('auth');
Route::get('edit-dr/{dr}', [DrController::class, 'edit'])->name('edit-dr')->middleware('auth');
Route::put('update-dr/{dr}', [DrController::class, 'update'])->name('update-dr')->middleware('auth');
Route::delete('destroy-dr/{dr}', [DrController::class, 'destroy'])->name('destroy-dr')->middleware('auth');


//روت های کارشناس فارم-----------------------------------------------------------//
Route::get('experts', [ExpertController::class, 'index'])->name('experts')->middleware('auth');
Route::get('add-expert', [ExpertController::class, 'add_expert'])->name('add-expert')->middleware('auth');
Route::post('create-expert', [ExpertController::class, 'create'])->name('create-expert')->middleware('auth');
Route::get('edit-expert/{expert}', [ExpertController::class, 'edit'])->name('edit-expert')->middleware('auth');
Route::put('update-expert/{expert}', [ExpertController::class, 'update'])->name('update-expert')->middleware('auth');
Route::delete('destroy-expert/{expert}', [ExpertController::class, 'destroy'])->name('destroy-expert')->middleware('auth');

//شروع دوره جوجه ریزی------------------------------------------------------//
Route::get('periods', [PeriodController::class, 'show'])->name('periods')->middleware('auth');
Route::get('report-period/{tarikh_start}/{breeder}', [PeriodController::class, 'report'])->name('report-period')->middleware('auth');
Route::get('start-period', [PeriodController::class, 'index'])->name('add-period')->middleware('auth');
Route::get('end-period/{period?}', [PeriodController::class, 'end_period_index'])->name('end-period')->middleware('auth');
Route::get('end-periods', [PeriodController::class, 'end_periods'])->name('end-periods')->middleware('auth');
Route::post('create-period', [PeriodController::class, 'create'])->name('create-period')->middleware('auth');
Route::put('create-end-period', [PeriodController::class, 'create_end_period'])->name('create-end-period')->middleware('auth');
Route::put('undo-end-period/{period}', [PeriodController::class, 'undo_end_period'])->name('undo-end-period')->middleware('auth');
Route::get('edit-start-period/{period}', [PeriodController::class, 'editStart'])->name('edit-start-period')->middleware('auth');
Route::put('update-start-period/{period}', [PeriodController::class, 'update_start'])->name('update-start-period')->middleware('auth');
Route::delete('destroy-period/{period}', [PeriodController::class, 'destroy'])->name('destroy-period')->middleware('auth');

//گزارش روزانه------------------------------//
Route::delete('destroy-daily-report/{dailyReport}', [DailyReportController::class, 'destroy'])->name('destroy-daily-report')->middleware('auth');
Route::get('daily-reports/{tarikh_start?}/{breeder?}', [DailyReportController::class, 'index'])->name('daily-reports')->middleware('auth');
Route::get('add-daily-report/{dailyReport?}', [DailyReportController::class, 'add'])->name('add-daily-report')->middleware('auth');
Route::get('view-daily-report/{dailyReport}', [DailyReportController::class, 'show'])->name('view-daily-report')->middleware('auth');
Route::get('edit-daily-report/{dailyReport}', [DailyReportController::class, 'edit'])->name('edit-daily-report')->middleware('auth');
Route::post('add-daily-report', [DailyReportController::class, 'create'])->name('create-daily-report')->middleware('auth');
Route::put('update-daily-report/{dailyReport}', [DailyReportController::class, 'update'])->name('update-daily-report')->middleware('auth');
