<?php

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

use App\MonthlyRent;

Route::get('/', function () {
    return view('Auth/login');
});

Route::get('/general-report', function () {
    return view('admin/reports/general-report');
});
Route::get('/floors/{id}', function ($id) {

    $floors=\App\Floor::where('project_id',$id)->get();

    return view('floors',compact('floors'));
});

Route::get('/units/{id}', function ($id) {

    $units=\App\Unit::where('floor_id',$id)->get();

    return view('units',compact('units'));
});
Route::get('/rent_agrement_detais/{id}', function ($id) {

    $rentalunit=\App\RentalUnit::where('unit_id',$id)->where('status',6)->first();
    return view('admin.rentalunits.show',compact('rentalunit'));
});

Route::get('/pay-rent/{id}', function ($id) {

    $monthly_rents=MonthlyRent::join('units','units.id','=','monthly_rents.unit_id')
    ->where('unit_id',$id)->where('units.status',6)
    ->orderby('monthly_rents.id','DESC')
    ->get();
    return view('admin.monthlyrents.index', compact('monthly_rents'));
});
Route::get('show-pending-rents','Admin\ReportsController@ShowPendingRents')->name('show-pending-rents');
Route::any('show-paid-rents','Admin\ReportsController@ShowPaidRents')->name('show-paid-rents');
Route::get('show-empty-units','Admin\ReportsController@ShowEmptyUnits')->name('show-empty-units');
Route::get('show-rental-units-list','Admin\ReportsController@ShowRentalUnitList')->name('show-rental-units-list');
Route::get('show-project-rent-summary','Admin\ReportsController@ShowProjectRentSummary')->name('show-project-rent-summary');

Route::get('show-general-summary','Admin\ReportsController@ShowGeneralSummary')->name('show-general-summary');
Route::get('receipt','Admin\ReportsController@Receipt')->name('Receipt');
Route::get('cash-sales','Admin\ReportsController@CashSales')->name('cash-sales');
Route::get('credit-sales','Admin\ReportsController@CreditSales')->name('credit-sales');
Route::get('sale-report/{id}', 'Admin\SalesController@salereport')->name('sale-report');;

//================================== Admin Panel Routes =======================================al
Route::redirect('login', 'login');
Route ::redirect('/reset','reset');

Route::redirect('/home', 'admin');
Route::resource('change-password', 'Auth\ResetPasswordController');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');


    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');
    Route::resource('faculty-members', 'FacultyMembersController');

    Route::resource('scheme-of-studies', 'SchemeOfStudiesController');
    Route::resource('programmes', 'ProgrammesController');
    Route::resource('courses', 'CoursesController');
    Route::resource('course-categories', 'CourseCategoriesController');
    Route::resource('news', 'NewsController');
    Route::resource('events', 'EventsController');
    Route::resource('jobs', 'JobsController');
    Route::resource('awards', 'AwardsController');
    Route::resource('publications', 'PublicationsController');
    Route::resource('workshops', 'WorkshopsController');
    Route::resource('memberships', 'MembershipsController');

    Route::resource('designations', 'DesignationController');
    Route::resource('faculties', 'FacultiesController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('objectives', 'ObjectivesController');
    Route::resource('offices', 'OfficesController');
    Route::resource('staff-members', 'StaffMembersController');

    Route::resource('change-password', 'AuthController');
    Route::resource('staff-job-responsibilities', 'StaffMemberJobResponsibilitiesController');
    Route::resource('office-projects', 'OfficeProjectsController');
    Route::resource('blogs', 'BlogsController');
    Route::resource('press', 'PressReleaseController');
    Route::resource('projects', 'ProjectController');
    Route::resource('floors', 'FloorController');
    Route::resource('units', 'UnitController');
    Route::resource('tenants', 'TenantController');
    Route::resource('rentalunits', 'RenatlUnitController');
    Route::resource('documents', 'DocumentController');
    Route::resource('monthlyrents', 'MonthlyRentController');
    Route::resource('students', 'StudentController');
    Route::resource('reports', 'ReportsController');
    Route::resource('sales', 'SalesController');
    Route::resource('installments', 'InstallmentController');



});

