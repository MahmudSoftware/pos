<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserRolePermissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\SendSmsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\YearSetupController;
use App\Http\Controllers\SendPurjeeController;
use App\Http\Controllers\DepertmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GazzeteController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MillYearlySetupController;
use App\Http\Controllers\MisReportController;
use App\Http\Controllers\ProductionReportController;
use App\Http\Controllers\PurjeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\SendPaymentController;
use App\Http\Controllers\SessionController;

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
    return view('welcome');
});
//Admin Route
Route::controller(AdminController::class)->prefix('superadmin')->group(function () {

    Route::get('/', 'index')->name('superadmin');
    Route::get('/register', 'create')->name('superadmin.register');

    // Route::get('/', 'index')->name('admin.user.index');
    Route::post('/store', 'store')->name('admin.user.store');
    Route::get('/{user}/edit', 'edit')->name('admin.user.edit');
    Route::put('/{user}/update', 'update')->name('admin.user.update');
    Route::get('/{user}/destroy', 'destroy')->name('admin.user.destroy');
    Route::get('/profile', 'userProfile')->name('admin.profile');
    Route::post('/profile/update', 'profileStore')->name('admin.update');
    Route::post('/password/update', 'PasswordUpdate')->name('admin.update.password');
});


Route::controller(TestController::class)->prefix('test')->group(function () {
    Route::get('/', 'index')->name('test.index');
    Route::get('/store', 'store')->name('test.store');
    // Route::get('/orders/{id}', 'show');
    // Route::post('/orders', 'store');
});

Route::prefix('admin')->group(function () {
    Route::controller(DashboardController::class)->prefix('/')->group(function () {
        Route::get('/', 'index')->name('dashboard.home.index')->middleware('auth');
    });
    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('dashboard.user.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.user.store');
        Route::get('/{user}/edit', 'edit')->name('dashboard.user.edit');
        Route::put('/{user}/update', 'update')->name('dashboard.user.update');
        Route::get('/{user}/destroy', 'destroy')->name('dashboard.user.destroy');
        Route::get('/profile', 'userProfile')->name('user.profile');
        Route::post('/profile/update', 'profileStore')->name('user.update');
        Route::post('/password/update', 'PasswordUpdate')->name('update.password');

        Route::get('/mill/list', 'millList')->name('mill_list');
        Route::post('/mill/store', 'millStore')->name('mill_store');
    });

    Route::controller(DepertmentController::class)->prefix('depertments')->group(function () {
        Route::get('/', 'index')->name('dashboard.depertment.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.depertment.store');

        Route::get('/status/{id}', 'status')->name('dashboard.depertment.status');

        Route::get('/test', 'test')->name('dashboard.depertment.test');
        Route::get('/{depertment}/edit', 'edit')->name('dashboard.depertment.edit');
        Route::put('/{depertment}/update', 'update')->name('dashboard.depertment.update');
        Route::get('/{depertment}/destroy', 'destroy')->name('dashboard.depertment.destroy');
        Route::post('/{depertment}/active', 'active')->name('dashboard.depertment.active');
        Route::post('/{depertment}/deactive', 'deactive')->name('dashboard.depertment.deactive');
        Route::post('file-import', 'fileImport')->name('dashboard.depertment.import');
        Route::get('file-export-excel', 'excel')->name('depertment.export.excle');
    });

    Route::controller(DesignationController::class)->prefix('designation')->group(function () {
        Route::get('/', 'index')->name('dashboard.designation.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.designation.store');
        Route::get('/{designation}/edit', 'edit')->name('dashboard.designation.edit');
        Route::put('/{designation}/update', 'update')->name('dashboard.designation.update');
        Route::get('/{designation}/destroy', 'destroy')->name('dashboard.designation.destroy');
        Route::post('/{designation}/active', 'active')->name('dashboard.designation.active');
        Route::post('/{designation}/deactive', 'deactive')->name('dashboard.designation.deactive');
    });

    Route::controller(OfficeController::class)->prefix('office')->group(function () {
        Route::get('/', 'index')->name('dashboard.office.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.office.store');
        Route::get('/edit/{id}', 'edit')->name('office.edit');
        Route::put('/update', 'update')->name('office.update');
        Route::get('/{office}/destroy', 'destroy')->name('dashboard.office.destroy');
        Route::post('/{office}/active', 'active')->name('dashboard.office.active');
        Route::post('/{office}/deactive', 'deactive')->name('dashboard.office.deactive');
    });

    Route::controller(YearSetupController::class)->prefix('year-setup')->group(function () {
        Route::get('/', 'index')->name('dashboard.yearSetup.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.yearSetup.store');
        Route::get('/{office}/edit', 'edit')->name('dashboard.yearSetup.edit');
        Route::put('/{office}/update', 'update')->name('dashboard.yearSetup.update');
        Route::get('/{office}/destroy', 'destroy')->name('dashboard.yearSetup.destroy');
      
    });
    //Mill Year Setup Route
    Route::controller(MillYearlySetupController::class)->prefix('mill-year-setup')->group(function () {
        Route::get('/', 'index')->name('dashboard.millYearSetup.index')->middleware('auth');
        Route::post('/store', 'store')->name('millYearSetup.store');
        Route::get('/{id}', 'edit')->name('millYearSetup.edit');
        Route::put('/update/{id}', 'update')->name('millYearSetup.update');
        Route::get('/destroy/{id}', 'destroy')->name('millYearSetup.destroy');
      
    });

    // Center Route
    Route::controller(CenterController::class)->prefix('center')->group(function () {
        Route::get('/', 'index')->name('dashboard.center.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.center.store');
        Route::get('/{center}/edit', 'edit')->name('dashboard.center.edit');
        Route::put('/{center}/update', 'update')->name('dashboard.center.update');
        Route::get('/{center}/destroy', 'destroy')->name('dashboard.center.destroy');
        Route::post('/{center}/active', 'active')->name('dashboard.center.active');
        Route::post('/{center}/deactive', 'deactive')->name('dashboard.center.deactive');

        Route::post('/{center}/restore', 'restore')->name('dashboard.center.restore');
        Route::delete('/{center}/force-delete', 'forceDelete')->name('dashboard.center.force-delete');
        // Route::post('/restore-all', 'UsersController@restoreAll')->name('users.restore-all');

    });

    // Unit Route
    Route::controller(UnitController::class)->prefix('unit')->group(function () {
        Route::get('/', 'index')->name('dashboard.unit.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.unit.store');
        Route::get('/{unit}/edit', 'edit')->name('dashboard.unit.edit');
        Route::put('/{unit}/update', 'update')->name('dashboard.unit.update');
        Route::get('/{unit}/destroy', 'destroy')->name('dashboard.unit.destroy');
        Route::post('/{unit}/active', 'active')->name('dashboard.unit.active');
        Route::post('/{unit}/deactive', 'deactive')->name('dashboard.unit.deactive');
        Route::post('/get-unit', 'unit')->name('dashboard.unit.get');
    });

    // Farmer Route
    Route::controller(FarmerController::class)->prefix('farmer')->group(function () {
        Route::get('/', 'index')->name('dashboard.farmer.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.farmer.store');
        Route::get('/edit/{id}', 'edit')->name('farmer.edit');
        Route::put('/update/{id}', 'update')->name('farmer.update');
        Route::get('/{farmer}/destroy', 'destroy')->name('dashboard.farmer.destroy');
        Route::post('/{farmer}/active', 'active')->name('dashboard.farmer.active');
        Route::post('/{farmer}/deactive', 'deactive')->name('dashboard.farmer.deactive');
        Route::post('file-import', 'fileImport')->name('dashboard.farmer.import');
        Route::get('file-export-excel', 'excel')->name('farmer.export.excle');

        Route::get('/get/farmer/{id}', 'getData')->name('get.farmer');
    });

    // Purjee Route
    Route::controller(PurjeeController::class)->prefix('purjee')->group(function () {
        Route::get('/', 'index')->name('dashboard.purjee.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.purjee.store');
        Route::get('/{purjee}/edit', 'edit')->name('dashboard.purjee.edit');
        Route::put('/{purjee}/update', 'update')->name('dashboard.purjee.update');
        Route::get('/{purjee}/destroy', 'destroy')->name('dashboard.purjee.destroy');
        Route::post('/{purjee}/active', 'active')->name('dashboard.purjee.active');
        Route::post('/{purjee}/deactive', 'deactive')->name('dashboard.purjee.deactive');

        // print purjee
        Route::get('/print-purjee-page', 'purjeePrintPage')->name('purjee.print.page');
        Route::get('/purjee/get', 'purjeeDataGet')->name('purjee.get.info');
        Route::get('/purjee/issue/date', 'purjeeIssueDate')->name('purjee.issueDate');
        Route::get('/purjee/print', 'purjeePrint')->name('purjee.print');

        Route::get('/add', 'create')->name('add_purjee');
        Route::get('/setup', 'purjeeNextPage')->name('next_page');
        Route::post('/purjee', 'store')->name('purjee_store');

        Route::post('/purjee/data', 'purjeeDataStore')->name('purjee.data.store');

        Route::get('/get/farmer/{id}', 'farmerPB')->name('user.delete');
    });

    // Send Purjee Route
    Route::controller(SendPurjeeController::class)->prefix('send-purjee')->group(function () {
        Route::get('/', 'index')->name('dashboard.sendPurjee.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.sendPurjee.store');
        Route::get('/{sendPurjee}/edit', 'edit')->name('dashboard.sendPurjee.edit');
        Route::put('/{sendPurjee}/update', 'update')->name('dashboard.sendPurjee.update');
        Route::get('/{sendPurjee}/destroy', 'destroy')->name('dashboard.sendPurjee.destroy');
        Route::post('/{sendPurjee}/active', 'active')->name('dashboard.sendPurjee.active');
        Route::post('/{sendPurjee}/deactive', 'deactive')->name('dashboard.sendPurjee.deactive');
        Route::get('/get/unit/{id}', 'getUnit')->name('get_Unit');
    });
    // Send Payment Route
    Route::controller(SendPaymentController::class)->prefix('send-payment')->group(function () {
        Route::get('/', 'index')->name('dashboard.sendPayment.index')->middleware('auth');
        // Route::post('/store', 'store')->name('dashboard.sendPurjee.store');
        // Route::get('/get/unit/{id}', 'getUnit')->name('get_Unit');
    });

    // SMS Route
    Route::controller(SmsController::class)->prefix('sms')->group(function () {
        Route::get('/', 'index')->name('dashboard.sms.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.sms.store');
        Route::get('/{sms}/edit', 'edit')->name('dashboard.sms.edit');
        Route::put('/{sms}/update', 'update')->name('dashboard.sms.update');
        Route::get('/{sms}/destroy', 'destroy')->name('dashboard.sms.destroy');
        Route::post('/{sms}/active', 'active')->name('dashboard.sms.active');
        Route::post('/{sms}/deactive', 'deactive')->name('dashboard.sms.deactive');
    });

    // Send SMS Route
    Route::controller(SendSmsController::class)->prefix('send-sms')->group(function () {
        Route::get('/', 'index')->name('dashboard.sendSms.index')->middleware('auth');
        Route::post('/store', 'store')->name('dashboard.sendSms.store');
        Route::get('/{sendSms}/edit', 'edit')->name('dashboard.sendSms.edit');
        Route::put('/{sendSms}/update', 'update')->name('dashboard.sendSms.update');
        Route::get('/{sendSms}/destroy', 'destroy')->name('dashboard.sendSms.destroy');
        Route::post('/{sendSms}/active', 'active')->name('dashboard.sendSms.active');
        Route::post('/{sendSms}/deactive', 'deactive')->name('dashboard.sendSms.deactive');
    });


    Route::controller(ProductionReportController::class)->prefix('production-report')->group(function () {
        Route::get('/', 'index')->name('dashboard.productionReport.index')->middleware('auth');
        Route::post('/store', 'store')->name('production.store');
        Route::get('/edit/{id}', 'edit')->name('production.edit');
        Route::put('/update/{id}', 'update')->name('production.update');
        Route::get('/delete/{id}', 'destroy')->name('production.destroy');
    });
    Route::controller(MisReportController::class)->prefix('mis-report')->group(function () {
        Route::get('/', 'index')->name('dashboard.mis_report.index')->middleware('auth');
        Route::get('/info/show', 'infoShow')->name('mis.info.show');
        Route::post('/mis/info/update', 'update')->name('mis.info.update');

        Route::get('/mis/get/data', 'misDataGet')->name('mis.get.data');
        
        Route::get('/get/data/{id}', 'getMisDataIdWise')->name('get.mis.data');
        Route::get('/print/data/', 'printData')->name('print.data');
    });
    Route::controller(ReportController::class)->prefix('report')->group(function () {
        Route::get('/', 'index')->name('dashboard.report.index')->middleware('auth');
        Route::get('/production', 'reportProduction')->name('report.production');
    });
    Route::controller(GazzeteController::class)->prefix('gazzete')->group(function () {
        Route::get('/', 'index')->name('gazzete.index')->middleware('auth');
        Route::get('/e-gazzete-List', 'gazzeteList')->name('gazzete.list');
        Route::get('/e-gazzete-print', 'gazzetePrint')->name('gazzete.print');
        Route::get('/gazzete-print', 'gazzetePrint')->name('egazzete.print');
        Route::get('/gazzete-list', 'gazzetePrint')->name('egazzete.list');
        Route::get('/e-gazzete-print', 'gazzetePrint')->name('gazzete.print');
        Route::get('/edit-gazzete-List', 'editGazzete')->name('edit-gazzete_list');
        Route::get('egazzete/list', 'egazzeteList')->name('gazzeteList');

        Route::post('save/ginal/gazzet', 'saveFinalGazzet')->name('saveFinalGazzet');

        Route::get('egazzete/gemerate', 'egazzeteGenerate')->name('gazzete.generate');
        Route::get('/export-gazette', 'exportToExcel')->name('exportGazetteToExcel');
    });
});



//User Role Route
Route::controller(UserRoleController::class)->prefix('user-role')->group(function () {
    Route::get('/create', 'create')->name('user.role.create');
    Route::get('/edit/{id}', 'rolEdit')->name('user.role.edit');
    Route::post('/store', 'roleStore')->name('user.role.store');
    Route::post('/update', 'roleUpdate')->name('user.role.update');
});

//User Role Permission Route
Route::controller(UserRolePermissionController::class)->prefix('role-permission')->group(function () {
    Route::get('permission/create', 'permissionCreate')->name('user.role.permission');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Create Contrroller
// Route::controller(RouteController::class)->prefix('route')->group(function () {

//     Route::get('/', 'index')->name('route.create');

//     Route::get('/', 'routeGroup')->name('user.route.group')->middleware('auth');

// });
Route::controller(RouteController::class)->prefix('route')->group(function () {
    Route::get('create', 'index')->name('route.create');
    Route::post('create/store', 'routeStore')->name('route.create.store');
    Route::get('group/create', 'routeGroup')->name('route.group.create');
    Route::post('group/store', 'routeGroupStore')->name('route.group.store');
    Route::get('group/edit', 'routeGroupEdit')->name('route.group.edit');
    Route::get('group/delete', 'routeGroupDelete')->name('route.group.delete');
    // Route::get('egazzete/print', 'egazzetePrint')->name('egazzete.print');

});

Route::controller(SessionController::class)->prefix('session')->group(function () {

    Route::get('/', 'index')->name('session.create');
    Route::post('/store', 'store')->name('dashboard.session.store');

    Route::get('/house/keeping', 'houeKeeping')->name('house.keeping');
});


//House Keeping



// Loan Setup
Route::controller(LoanController::class)->prefix('loan')->group(function () {

    Route::get('/head/entry', 'index')->name('head.entry');
    Route::post('/head/entry/store', 'store')->name('dashboard.head.store');
    Route::get('/{ModelsLoanHead}/edit/head/entry', 'editHeadEntry')->name('edit.head.entry');
    Route::put('/{ModelsLoanHead}/update', 'update')->name('head.update');
    Route::get('/sub/head/entry', 'subHeadEntry')->name('sub.head.entry');
    Route::get('/land/loan/setup', 'landLoanSetup')->name('land.loan.setup');
    Route::get('/loan/entry', 'loanEntry')->name('loan.entry');

});
