<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SchoolsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\TransferReportController;
use App\Http\Controllers\Admin\OrderReportsController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\TourOperatorController;
use App\Http\Controllers\Admin\SchoolTourBookingsController;
use App\Http\Controllers\Admin\CarRentalsController;
use App\Http\Controllers\Admin\CarRentalCheckOutController;

use App\Http\Controllers\School\TransfersController;
use App\Http\Controllers\School\SchoolAdminController;
use App\Http\Controllers\School\SchoolStudentController;
use App\Http\Controllers\School\CartController;
use App\Http\Controllers\School\OrderController;
use App\Http\Controllers\School\CheckoutController;
use App\Http\Controllers\School\SchoolOrdersReportController;
use App\Http\Controllers\School\SchoolFeesAmountsController;
use App\Http\Controllers\School\SchoolFeesCollectionController;
use App\Http\Controllers\School\SchoolFeesReportController;
use App\Http\Controllers\School\ExpenseController;
use App\Http\Controllers\School\ExpenseReportController;
use App\Http\Controllers\School\PurchasesController;
use App\Http\Controllers\School\PurchasesReportController;
use App\Http\Controllers\School\SchoolToursController;
use App\Http\Controllers\School\IncomeStatementController;
use App\Http\Controllers\School\ShopController;
use App\Http\Controllers\School\ClassTermChangeController;
use App\Http\Controllers\School\TourCartController;
use App\Http\Controllers\School\TourBookingsController;
use App\Http\Controllers\School\TourCheckoutController;


use App\Http\Controllers\Students\FilesController;
use App\Http\Controllers\Students\StudentProfileController;
use App\Http\Controllers\Students\FolderController;

use App\Http\Controllers\Tours\TourAdminController;
use App\Http\Controllers\Tours\ToursTravelsController;
use App\Http\Controllers\Tours\SchoolTourBookingController;


use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\StudentUserController;
use App\Http\Controllers\TourOperatorUserController;

use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\PasswordResetController;


use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Dcblogdev\Dropbox\Facades\Dropbox;

use Laravel\Socialite\Facades\Socialite;

use App\Models\Students;
use App\Models\User;
use App\Models\TourOperator;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

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



Route::get('/', function () {
return view('auth.login');
});   


Route::middleware('admin:admin')->group(function () {
Route::get('admin/login', [AdminUserController::class, 'loginForm']);
Route::post('admin/login', [AdminUserController::class, 'store'])->name('admin.login');
});




Route::middleware('student:student')->group(function () {
Route::get('student/login', [StudentUserController::class, 'loginForm']);
Route::post('student/login', [StudentUserController::class, 'store'])->name('student.login');
});






Route::middleware('tour-operator')->group(function () {
Route::get('touroperator/login', [TourOperatorUserController::class, 'loginForm']);
Route::post('touroperator/login', [TourOperatorUserController::class, 'store'])->name('touroperator.login');
});





///Schools Password Reset Section////

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');


Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');












///Tour Operators Password Reset Section////


Route::get('/touroperator/forgot-password', function () {
    return view('auth.tour-operator-forgot-password');
})->middleware('guest')->name('tour.operator.password.request');


Route::post('/touroperator/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $tour_status = Password::broker('touroperators')->sendResetLink(
        $request->only('email')
    );
 
    return $tour_status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($tour_status)])
                : back()->withErrors(['email' => __($tour_status)]);
})->middleware('guest')->name('tour.operator.password.email');


Route::get('/touroperator/reset-password/{token}', function (string $token) {
    return view('auth.tour-operator-reset-password', ['token' => $token]);
})->middleware('guest')->name('tour.operator.password.reset');


Route::post('/touroperator/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $tour_status = Password::broker('touroperators')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (TourOperator $tour, string $tour_password) {
            $tour->forceFill([
                'password' => Hash::make($tour_password)
            ])->setRememberToken(Str::random(60));
 
            $tour->save();
 
            event(new PasswordReset($tour));
        }
    );
 
    return $tour_status === Password::PASSWORD_RESET
                ? redirect('touroperator/login')->with('status', __($tour_status))
                : back()->withErrors(['email' => [__($tour_status)]]);
})->middleware('guest')->name('tour.operator.reset.password.update');





///Admin Password Reset Section////
Route::get('/admin/forgot-password', function () {
    return view('auth.admin-forgot-password');
})->middleware('guest')->name('admin.password.request');


Route::post('/admin/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $admin_status = Password::broker('admins')->sendResetLink(
        $request->only('email')
    );
 
    return $admin_status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($admin_status)])
                : back()->withErrors(['email' => __($admin_status)]);
})->middleware('guest')->name('admin.password.email');


Route::get('/admin/reset-password/{token}', function (string $token) {
    return view('auth.admin-reset-password', ['token' => $token]);
})->middleware('guest')->name('admin.password.reset');



Route::post('/admin/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $admin_status = Password::broker('admins')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Admin $admin, string $admin_password) {
            $admin->forceFill([
                'password' => Hash::make($admin_password)
            ])->setRememberToken(Str::random(60));
 
            $admin->save();
 
            event(new PasswordReset($admin));
        }
    );
 
    return $admin_status === Password::PASSWORD_RESET
                ? redirect('admin/login')->with('status', __($admin_status))
                : back()->withErrors(['email' => [__($admin_status)]]);
})->middleware('guest')->name('admin.reset.password.update');







///Studnets Password Reset Section////

Route::get('/students/forgot-password', function () {
    return view('auth.students-forgot-password');
})->middleware('guest')->name('students.password.request');


Route::post('/students/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $student_status = Password::broker('students')->sendResetLink(
        $request->only('email')
    );
 
    return $student_status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($student_status)])
                : back()->withErrors(['email' => __($student_status)]);
})->middleware('guest')->name('students.password.email');


Route::get('/students/reset-password/{token}', function (string $token) {
    return view('auth.students-reset-password', ['token' => $token]);
})->middleware('guest')->name('students.password.reset');



Route::post('/studnets/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $student_status = Password::broker('students')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (Students $student, string $student_password) {
            $student->forceFill([
                'password' => Hash::make($student_password)
            ])->setRememberToken(Str::random(60));
 
            $student->save();
 
            event(new PasswordReset($student));
        }
    );
 
    return $student_status === Password::PASSWORD_RESET
                ? redirect('student/login')->with('status', __($student_status))
                : back()->withErrors(['email' => [__($student_status)]]);
})->middleware('guest')->name('students.reset.password.update');









// start of prevent-back-history middleware
Route::middleware(['prevent-back-history'])->group(function () {


//Admin General Middleware

Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'), 'verified'])->group(function () {

Route::get('/admin/dashboard', function () {
return view('admin.body.index');})->name('admin.dashboard');
});


Route::group(['prefix' => 'admin','middleware' =>['auth:admin']],function(){


Route::get('/logout',[AdminUserController::class,'destroy'])->name('admin.logout');
Route::get('/profile',[AdminController::class,'profileAdmin'])->name('profile.view');

Route::post('/profile/update',[AdminController::class,'profileUpdate'])->name('admin.profile.update');
Route::post('/password/update',[AdminController::class,'passUpdate'])->name('admin.password.update');



Route::get('/users', [AdminController::class, 'ViewAdminUsers'])->name('view.admin.user');

Route::post('/user/store', [AdminController::class, 'StoreAdminUser'])->name('admin.user.store');

Route::get('/edit/user/{id}', [AdminController::class, 'EditAdminUser'])->name('user.edit');
Route::post('/update/user/{id}', [AdminController::class, 'UpdateAdminUser'])->name('user.update');

Route::get('/user/delete/{id}', [AdminController::class, 'DeleteAdminUser'])->name('delete.admin.user');


Route::get('/user/inactive/{id}',[AdminController::class,'inactiveAdminUser'])->name('admin.user.inactive');

Route::get('/user/active/{id}',[AdminController::class,'activeAdminUser'])->name('admin.user.active');



//Schools Routes
Route::get('/view/schools', [SchoolsController::class, 'ViewSchools'])->name('view.schools');

Route::post('/store/school', [SchoolsController::class, 'store'])->middleware(['auth','verified'])->name('schools.store');


Route::get('/school/edit/{id}', [SchoolsController::class, 'EditSchools'])->name('edit.school');


Route::post('/school/update/{id}', [SchoolsController::class, 'update'])->middleware(['auth','verified'])->name('school.update');

Route::get('/school/inactive/{id}',[SchoolsController::class,'inactiveSchools'])->middleware(['auth','verified'])->name('school.inactive');

Route::get('/school/active/{id}',[SchoolsController::class,'activeSchools'])->middleware(['auth','verified'])->name('school.active');



// All Students Informations
Route::get('/view/students', [SchoolsController::class, 'ViewSchoolStudents'])->name('view.all.students');


// All Tour Operators Informations

Route::get('/view/tours/operators', [TourOperatorController::class, 'ViewTourOperator'])->name('view.tours.operators');

Route::post('/store/tours/operator', [TourOperatorController::class, 'storeTourOperator'])->middleware(['auth','verified'])->name('tours.operator.store');

Route::get('/tours/operator/edit/{id}', [TourOperatorController::class, 'EditTourOperator']);

Route::post('/tours-operator-update', [TourOperatorController::class, 'update'])->middleware(['auth','verified']);

Route::get('/tours/operator/inactive/{id}',[TourOperatorController::class,'inactiveTourOperator'])->middleware(['auth','verified'])->name('tours.operator.inactive');

Route::get('/tours/operator/active/{id}',[TourOperatorController::class,'activeTourOperator'])->middleware(['auth','verified'])->name('tours.operator.active');



//Roles
Route::get('/roles/view',[RoleController::class,'index'])->middleware(['auth','verified'])->name('role.index');

Route::get('/roles/show/{id}',[RoleController::class,'show'])->name('role.show');

Route::post('/roles/store', [RoleController::class, 'store'])->middleware(['auth','verified'])->name('roles.store');

Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->middleware(['auth','verified'])->name('role.edit');

Route::post('/roles/update/{id}', [RoleController::class, 'update'])->middleware(['auth','verified'])->name('role.update');

Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->middleware(['auth','verified'])->name('role.delete');





//Permissions Routes ///
Route::get('/permissions/view',[PermissionController::class,'index'])->name('permissions.view');

Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');

Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');

Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permission.update');

Route::get('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.delete');









//Products 

Route::get('/view/products',[ProductsController::class,'viewProducts'])->name('view.products');
Route::post('/store/product',[ProductsController::class,'storeProduct'])->name('product.store');
Route::get('/edit/product/{id}',[ProductsController::class,'editProduct'])->name('product.edit');
Route::post('/update/product/{id}',[ProductsController::class,'updateProduct'])->name('product.update');

//Categories

Route::get('/view/categories',[ProductsController::class,'viewCategories'])->name('view.categories');
Route::post('/store/category',[ProductsController::class,'storeCategory'])->name('category.store');
Route::get('/edit/category/{id}',[ProductsController::class,'editCategory']);
Route::post('/update-category',[ProductsController::class,'updateCategory']);



//School Terms

Route::get('/view/school/terms',[TermController::class,'viewTerms'])->name('view.terms');
Route::post('/store/school/term',[TermController::class,'storeTerm'])->name('term.store');
Route::get('/edit/school/term/{id}',[TermController::class,'editTerm']);
Route::post('/update-school-term',[TermController::class,'updateTerm']);




//Tours Destinations

Route::get('/view/tour/destinations',[TermController::class,'viewTourDestinations'])->name('view.tour.destinations');
Route::post('/store/tour/destination',[TermController::class,'storeTourDestination'])->name('tour.destination.store');
Route::get('/edit/tour/destination/{id}',[TermController::class,'editTourDestination']);
Route::post('/update-tour-destination',[TermController::class,'updateTourDestination']);




//School ORDERS

Route::get('/view/school/orders', [OrdersController::class, 'SchoolOrders'])->name('school.orders');

Route::get('/order/details/{order_id}', [OrdersController::class, 'SchoolOrderDetails'])->name('order.details');

Route::get('/confirmed/orders', [OrdersController::class, 'ConfirmedOrders'])->name('confirmed-orders');

Route::get('/out/for/delivery/orders', [OrdersController::class, 'ShippedOrders'])->name('shipped-orders');

Route::get('/delivered/orders', [OrdersController::class, 'DeliveredOrders'])->name('delivered-orders');


Route::get('/order/details/invoice/{order_id}', [OrdersController::class, 'SchoolOrderDetailsInvoice'])->name('order.details.invoice');


Route::get('/school/orders/payments', [OrdersController::class, 'SchoolOrdersPayments'])->name('school-orders-payments');


Route::get('/all/orders/payments/records', [OrdersController::class, 'AllOrdersPaymentsRecords'])->name('school-orders-payments-records');


///Offline Order Payments///


Route::get('/make/order/offline/payment/{order_id}', [OrdersController::class, 'MakeOrderPayment'])->name('make.order.offline.payment'); 

Route::post('/submit/order/payment/{order_id}', [OrdersController::class, 'SubmitSchoolOrderPayment'])->name('submit.order.payment');

Route::post('/school/orders/payment/{order_id}', [OrdersController::class, 'SchoolOrdersPayment'])->name('order.balance.topup.payment');

Route::get('/offline/orders/track/invoice/{order_id}', [OrdersController::class, 'OfflineOrdersTrackInvoice'])->name('offline.orders.track.invoice'); 



Route::get('/make/order/offline/payment/{order_id}', [OrdersController::class, 'MakeOrderPayment'])->name('make.order.offline.payment'); 


Route::get('/edit/offline/order/payment/{order_id}', [OrdersController::class, 'EditSchoolOrderOfflinePayment'])->name('offline.order.payment.edit'); 

Route::post('/update/offline/order/payment/{order_id}', [OrdersController::class, 'UpdateSchoolOrderOfflinePayment'])->name('offline.order.payment.update');


Route::get('/offline/order/payment/invoice/{id}', [OrdersController::class, 'OfflineOrderPaymentInvoice'])->name('offline.order.payment.invoice'); 

Route::get('/offline/order/payment/delete/{id}', [OrdersController::class, 'OfflineOrderPaymentDelete'])->name('delete.offline.order.payment'); 





// Update Order Status 
Route::get('/pending/to/confirmed/{order_id}', [OrdersController::class, 'PendingToConfirm'])->name('pending-confirm');

Route::get('/confirm/to/shipped/{order_id}', [OrdersController::class, 'ConfirmToShipped'])->name('confirm.shipped');

Route::get('/shipped/to/delivered/{order_id}', [OrdersController::class, 'ShippedToDelivered'])->name('shipped.delivered');





//School Tour Booking & Packages

Route::get('/view/all/tour/packages', [SchoolTourBookingsController::class, 'SchoolTourPackages'])->name('all.school.tour.packages');

Route::get('/tour/details/{id}',[SchoolTourBookingsController::class,'tourPackageDetails'])->name('tour.details');



Route::get('/tour/bookings/details/{booking_id}', [SchoolTourBookingsController::class, 'SchoolTourBookingDetails'])->name('school.tour.bookings.details');

Route::get('/pending/tour/bookings', [SchoolTourBookingsController::class, 'PendingBookings'])->name('pending-tour-bookings');

Route::get('/confirmed/tour/bookings', [SchoolTourBookingsController::class, 'ConfirmedBookings'])->name('confirmed-tour-bookings');

Route::get('/cancelled/tour/bookings', [SchoolTourBookingsController::class, 'CancelledBookings'])->name('cancelled-tour-bookings');

Route::get('/tour/bookings/invoice/{booking_id}', [SchoolTourBookingsController::class, 'SchoolTourBookingInvoice'])->name('school.tour.bookings.invoice');


Route::get('/tour/bookings/payments', [SchoolTourBookingsController::class, 'SchoolTourBookingsPayments'])->name('tour-bookings-payments');


// Update Tour Booking  Status 
Route::get('/tour/pending/to/confirmed/{booking_id}', [SchoolTourBookingsController::class, 'PendingToConfirmBooking'])->name('pending.confirm.bookings');



// Admin Review All Route 
Route::controller(ReviewController::class)->group(function(){
Route::get('/pending/reviews','PendingReviews')->name('pending.reviews'); 
Route::get('/update/review/stauts/{review_id}','UpdateReviewStatus')->name('update.review.stauts'); 
Route::get('/published/reviews','PublishedReviews')->name('published.reviews');


});





//Car Rentals Booking & Packages

Route::get('/view/rental/operators', [CarRentalsController::class, 'ViewRentalOperator'])->name('all.rental.operators');


Route::get('/add/new/rental/operators', [CarRentalsController::class, 'AddNewRentalOperator'])->name('add.rental.operators');

Route::post('/store/rental/operator', [CarRentalsController::class, 'storeRentalOperator'])->middleware(['auth','verified'])->name('rental.operator.store');

Route::get('/rental/operator/edit/{id}', [CarRentalsController::class, 'EditRentalOperator'])->name('edit.rental.operator');

Route::post('/rental-operator-update/{id}', [CarRentalsController::class, 'updateRentalOperator'])->middleware(['auth','verified'])->name('update.rental.operator');

Route::get('/rental/operator/inactive/{id}',[CarRentalsController::class,'inactiveRentalOperator'])->middleware(['auth','verified'])->name('rental.operator.inactive');

Route::get('/rental/operator/active/{id}',[CarRentalsController::class,'activeRentalOperator'])->middleware(['auth','verified'])->name('rental.operator.active');



Route::get('/car-rental/bookings/details/{booking_id}', [CarRentalCheckOutController::class, 'SchoolVehicleRentalBookingDetails'])->name('car.rental.bookings.details');

Route::get('/pending/car-rental/bookings', [CarRentalCheckOutController::class, 'PendingBookings'])->name('pending-car-rental-bookings');

Route::get('/confirmed/car-rental/bookings', [CarRentalCheckOutController::class, 'ConfirmedBookings'])->name('confirmed-car-rental-bookings');

Route::get('/cancelled/car-rental/bookings', [CarRentalCheckOutController::class, 'CancelledBookings'])->name('cancelled-car-rental-bookings');

Route::get('/car-rental/bookings/invoice/{booking_id}', [CarRentalCheckOutController::class, 'SchoolVehicleRentalBookingInvoice'])->name('car.rental.bookings.invoice');


Route::get('/car-rental/bookings/payments', [CarRentalCheckOutController::class, 'SchoolBusRentalBookingsPayments'])->name('car-rental-bookings-payments');


// Update Car Rental Booking  Status 
Route::get('/car/rental/pending/to/confirmed/{booking_id}', [CarRentalCheckOutController::class, 'PendingToConfirmBooking'])->name('pending.confirm.car.rental.bookings');




///Rental Vehicles 

Route::controller(CarRentalsController::class)->group(function(){

    
Route::get('/view/all/bus/rentals', 'AllBusRentals')->name('view.all.bus.rentals');

Route::get('/edit/vehicle/{id}', 'EditVehicle');
Route::post('/update/vehicle', 'UpdateVehicle');

Route::post('/store/vehicle/{id}', 'StoreVehicle')->name('store.vehicle');

Route::get('/delete/vehicle/{id}', 'DeleteVehicle')->name('delete.vehicle');

});




///Transportation Routes

Route::controller(CarRentalsController::class)->group(function(){

Route::get('/edit/route/{id}', 'EditRoute');
Route::post('/update/route', 'UpdateRoute');

Route::post('/store/route/{id}', 'StoreRoute')->name('store.route');

Route::get('/delete/route/{id}', 'DeleteRoute')->name('delete.route');

});








//Orders Reports    
///Route::get('/weekly/orders/reports', [OrderReportsController::class, 'ViewWeeklyOrdersReports'])->name('weekly.orders.reports');

Route::get('/monthly/orders/reports', [OrderReportsController::class, 'ViewMonthlyOrdersReports'])->name('monthly.orders.reports');

Route::get('/yearly/orders/reports', [OrderReportsController::class, 'ViewYearlyOrdersReports'])->name('yearly.orders.reports');


///Route::post('orders/report/search/by/week',[OrderReportsController::class,'OrdersReportsByWeek'])->name('search-orders-by-week');

Route::post('orders/report/search/by/month',[OrderReportsController::class,'OrdersReportsByMonth'])->name('search-orders-by-month');

Route::post('orders/report/search/by/year', [OrderReportsController::class,'OrdersReportsByYear'])->name('search-orders-by-year');


//Report for PocketMoney  Transfers Submitted
Route::get('/order/details/report/{order_id}', [OrderReportsController::class, 'ViewOrderReportDetails'])->name('order.details.invoice.report');




//All School Tour Bookings Reports
Route::get('/all/yearly/tour/bookings/reports', [SchoolTourBookingController::class, 'ViewAllYearlyTourBookingsReports'])->name('all.tour.bookings.reports');

Route::post('/all/tour/bookings/report/by/year',[SchoolTourBookingController::class,'AllTourBookingsReportsByYear'])->name('search-school-tour-booking-by-year');





//All Rental Bookings Reports///

 
Route::get('/all/rental/bookings/report', [CarRentalsController::class, 'AllRentalBookingReport'])->name('all.rental.bookings.reports');

Route::post('/all/rental/bookings/report/by/year',[CarRentalsController::class,'AllRentalBookingsReportsByYear'])->name('search-school-rental-booking-by-year');





});    //End of Admin General Middleware









//General Auth Middleware for Schools Users
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

Route::get('/dashboard', function (){

return view('school.body.index'); 

})->name('dashboard')->middleware('auth');

}); 


Route::group(['prefix' => 'school','middleware' =>['auth']],function(){


// School Users all Routes
Route::get('/logout',[SchoolAdminController::class,'destroy'])->name('school.logout');
Route::get('/user/profile',[SchoolAdminController::class,'SchoolUserprofile'])->name('school.user.profile.view');
Route::post('/school/profile/update',[SchoolAdminController::class,'profileUpdate'])->name('school.profile.update')->middleware(['image-sanitize']);
Route::post('/password/update',[SchoolAdminController::class,'schoolpassUpdate'])->name('school.password.update');




//Students Routes

Route::get('/view/students', [SchoolStudentController::class, 'ViewStudents'])->name('view.students');

Route::post('/store/student', [SchoolStudentController::class, 'StoreStudents'])->name('students.store');

Route::get('/view/old/students', [SchoolStudentController::class, 'ViewOldStudents'])->name('view.old.students');
Route::get('/add/old/students/{id}', [SchoolStudentController::class, 'AddOldStudents'])->name('add.old.students');
Route::post('/store/old/student/{id}', [SchoolStudentController::class, 'StoreOldStudents'])->name('old.students.store');


Route::get('/student/edit/{id}', [SchoolStudentController::class, 'EditStudents'])->name('edit.student');

Route::get('/student/view/details/{id}', [SchoolStudentController::class, 'StudentDetails']);

Route::post('/student/update/{id}', [SchoolStudentController::class, 'UpdateStudents'])->name('students.update');

Route::get('/student/inactive/{id}',[SchoolStudentController::class,'inactiveStudents'])->name('students.inactive');

Route::get('/student/active/{id}',[SchoolStudentController::class,'activeStudents'])->name('students.active');



//Students Class Promotions//

Route::get('/view/students/class/promote', [ClassTermChangeController::class, 'StudentsClassPromotion'])->name('students.class.promote');

Route::get('students/class/wise', [ClassTermChangeController::class, 'StudentsClassWise'])->name('students.class.wise');

Route::post('students/class/promotion/store', [ClassTermChangeController::class, 'ClassPromotion'])->name('students.class.promote.store');




//Students Term Change//

Route::get('/view/students/term/change', [ClassTermChangeController::class, 'StudentsTermChange'])->name('students.term.change');

Route::get('students/term/class/wise', [ClassTermChangeController::class, 'StudentsTermClassWise'])->name('students.term.class.wise');

Route::post('students/term/change/store', [ClassTermChangeController::class, 'TermChange'])->name('students.term.change.store');




//Offline Payments SchoolFees Payments Transactions Views
Route::get('/weekly/offline/schoolfees/transactions/reports', [TransferReportController::class, 'ViewWeeklyOfflineSchoolFeesTransfersReports'])->name('weekly.offline.schoolfees.transfers.reports');

Route::get('/monthly/offline/schoolfees/transactions/reports', [TransferReportController::class, 'ViewMonthlyOfflineSchoolFeesTransfersReports'])->name('monthly.offline.schoolfees.transfers.reports');

Route::get('/yearly/offline/schoolfees/transactions/reports', [TransferReportController::class, 'ViewYearlyOfflineSchoolFeesTransfersReports'])->name('yearly.offline.schoolfees.transfers.reports');


//Offline Payments SchoolFees Transactions View Filters
Route::post('/offline/schoolfees/transfers/report/search/by/week',[TransferReportController::class,'OfflineSchoolfeesTransferReportByWeek'])->name('search-offline-schoolfees-transfers-by-week');

Route::post('/offline/schoolfees/transfers/report/search/by/month',[TransferReportController::class,'OfflineSchoolfeesTransferReportByMonth'])->name('search-offline-schoolfees-transfers-by-month');

Route::post('/offline/schoolfees/transfers/report/search/by/year', [TransferReportController::class,'OfflineSchoolfeesTransferReportByYear'])->name('search-offline-schoolfees-transfers-by-year');








//School eCommerce SECTION


///School Tours $ Travels Routes///
Route::get('/ecommerce/dashboard',[ShopController::class,'ViewEcommerceDash'])->name('school.ecommerce.dashboard');

Route::get('/eCommerce/shopping',[ShopController::class,'viewProductList'])->name('school.products');

Route::get('/product/details/{id}/{product_name}',[ShopController::class,'productDetails'])->name('product.details');

Route::get('/view/cart/products',[CartController::class,'ViewCart'])->name('view.cart');

Route::post('/cart/product/store',[CartController::class,'addToCart'])->name('add.to.cart');

Route::get('/cart/quantity/increment/{id}',[CartController::class,'updateCartQty'])->name('cart.qty.increment');

Route::get('/cart/quantity/decrement/{id}',[CartController::class,'decreCartQty'])->name('cart.qty.decrement');


Route::delete('/cart/remove',[CartController::class,'removeCart'])->name('cart.remove');

Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');



// School Orders

Route::post('/submit/orders', [OrderController::class, 'SubmitOrders'])->name('submit.orders');


Route::post('/submit/credits/orders', [OrderController::class, 'SubmitCreditOrders'])->name('submit.credit.orders');


Route::get('/view/my/orders', [OrderController::class, 'MyOrders'])->name('view.school.orders');

Route::get('/order/details/{order_id}', [OrderController::class, 'OrderDetails'])->name('school.order.details'); 

Route::get('/cancel/order/{order_id}', [OrderController::class, 'CancelOrder'])->name('cancel.order');


Route::get('/offline/order/payment/track/invoice/{order_id}', [OrderController::class, 'OfflineOrderPaymentTrackInvoice'])->name('offline.order.payments.track.invoice'); 


 
// Checkout Routes 

Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


Route::post('/checkout/credit/order/store', [CheckoutController::class, 'CheckoutCreditStore'])->name('checkoutcredit.store');


//Report Orders 
Route::get('/order/report/details/{order_id}', [OrderController::class, 'ViewOrderReportInvoice'])->name('order.invoice.report.details');



//Orders Reports    
Route::get('/weekly/school/orders/reports', [SchoolOrdersReportController::class, 'ViewWeeklyOrdersReports'])->name('school.weekly.orders.reports');

Route::get('/monthly/school/orders/reports', [SchoolOrdersReportController::class, 'ViewMonthlyOrdersReports'])->name('school.monthly.orders.reports');

Route::get('/yearly/school/orders/reports', [SchoolOrdersReportController::class, 'ViewYearlyOrdersReports'])->name('school.yearly.orders.reports');


Route::post('/search/school/orders/report/by/week',[SchoolOrdersReportController::class,'OrdersReportsByWeek'])->name('search-school-orders-by-week');

Route::post('/search/school/orders/report/by/month',[SchoolOrdersReportController::class,'OrdersReportsByMonth'])->name('search-school-orders-by-month');

Route::post('/search/school/orders/report/by/year', [SchoolOrdersReportController::class,'OrdersReportsByYear'])->name('search-school-orders-by-year');








// Fee Category Amount Routes 

Route::get('fee/amount/view', [SchoolFeesAmountsController::class, 'ViewFeeAmount'])->name('fee.amount.view');

Route::get('fee/amount/add', [SchoolFeesAmountsController::class, 'AddFeeAmount'])->name('fee.amount.add');

Route::post('fee/amount/store', [SchoolFeesAmountsController::class, 'StoreFeeAmount'])->name('store.fee.amount');

Route::get('fee/amount/edit/{rand_no}', [SchoolFeesAmountsController::class, 'EditFeeAmount'])->name('fee.amount.edit');

Route::post('fee/amount/update/{rand_no}', [SchoolFeesAmountsController::class, 'UpdateFeeAmount'])->name('update.fee.amount');




// All Students SchoolFees Collections Informations

Route::get('/view/student/schoolfees/collections', [SchoolFeesCollectionController::class, 'ViewFeesCollections'])->name('view.fees.collections');


Route::get('/student/fees/edit/{id}', [SchoolFeesCollectionController::class, 'StudentFeesEdit'])->middleware(['auth','verified'])->name('student.fees.update');


Route::post('student/fees/update/store/{id}', [SchoolFeesCollectionController::class, 'StudentFeesUpdateStore'])->name('student.fees.update.store');


Route::get('/student/fees/collections/details/{invoice_no}', [SchoolFeesCollectionController::class, 'ViewStudentFeesCollectionDetails'])->middleware(['auth','verified'])->name('student.fees.collections.details');


Route::get('/get/fees/balance/amount',[SchoolFeesCollectionController::class, 'GetBalanceAmount'])->name('get-fees-balance-amount'); 


Route::post('/student/mobile/balance/payment/{invoice_no}', [SchoolFeesCollectionController::class, 'MobileFeesBalancePayment'])->name('student.mobile.balance.payment');

Route::get('/view/schoolfees/collections', [SchoolFeesCollectionController::class, 'ViewSchoolFeesCollections'])->name('view.schoolfees.collections.filter');

Route::get('/student/fees/collections/report/print/{id}', [SchoolFeesCollectionController::class, 'ViewStudentFeesCollectionReportPrint'])->name('student.fees.collections.report.print');


//Offline Students SchoolFees Payments

Route::get('/make/offline/payments', [SchoolFeesCollectionController::class, 'MakeOfflineSchoolFeesPayments'])->name('make.offline.payments');


Route::get('/make/offline/schoolfees/payment/{id}', [SchoolFeesCollectionController::class, 'MakeStudentOfflinePayment'])->name('student.make.offline.schoolfees.payment');


Route::post('/student/submit/offline/payment/{student_code}', [SchoolFeesCollectionController::class, 'SubmitStudentOfflineSchoolfeesPayment'])->name('student.submit.offline.schoolfees.payment');



Route::get('/student/offline/track/invoice/{invoice_no}', [SchoolFeesCollectionController::class, 'StudentOfflineTrackInvoice'])->name('student.offline.track.invoice'); 


Route::get('/student/mobile/track/invoice/{student_acct_no}', [SchoolFeesCollectionController::class, 'StudentMobileTrackInvoice'])->name('student.mobile.track.invoice'); 


Route::post('/student/offline/payment/{invoice_no}', [SchoolFeesCollectionController::class, 'SubmitStudentOfflinePayments'])->name('student.cash.payment');


Route::get('/student/offline/payment/invoice/{id}', [SchoolFeesCollectionController::class, 'StudentOfflinePaymentInvoice'])->name('offline.payment.invoice'); 

Route::get('/student/offline/payment/delete/{id}', [SchoolFeesCollectionController::class, 'StudentOfflinePaymentDelete'])->name('delete.offline.payment'); 




//Students Financial Statements for SchoolFees Collection

Route::get('/view/fees/financial/statements', [SchoolFeesReportController::class, 'StudentFeesFinancialStatement'])->name('get.financial.statements');

Route::get('/generate/student/financial/statement/{id}', [SchoolFeesReportController::class, 'GenerateFinancialStatement'])->middleware(['auth','verified'])->name('generate.student.financial.statement');

Route::post('/get/student/termly/financial/statements/{invoice_no}', [SchoolFeesReportController::class, 'GetStudentTermlyFinancialStatement'])->middleware(['auth','verified'])->name('get.student.termly.schoolfees.financial.statement');

Route::post('/get/student/yearly/financial/statements/{student_code}', [SchoolFeesReportController::class, 'GetStudentYearlyFinancialStatement'])->middleware(['auth','verified'])->name('get.student.yearly.schoolfees.financial.statement');



// All Students Admissions Fees Collections & Reports

Route::get('/view/admission/fees/collections', [SchoolFeesCollectionController::class, 'ViewAdmissionFeesCollections'])->name('view.admission.fees');

Route::get('/admission/fee/edit/{id}', [SchoolFeesCollectionController::class, 'AdmissionFeeEdit'])->name('edit.admission.fee');

Route::post('/admission/fee/update/{id}', [SchoolFeesCollectionController::class, 'AdmissionFeeUpdate'])->name('update.admission.fee');


Route::get('/view/admission/fees/collections/report', [SchoolFeesReportController::class, 'ViewAdmissionFeesReport'])->name('view.admission.fees.report');

Route::post('/search/admission/fees/termly/report',[SchoolFeesReportController::class,'AdmissionFeesTermlyReport'])->name('search-admission-fees-by-term');

Route::post('/search/admission/fees/yearly/report',[SchoolFeesReportController::class,'AdmissionFeesYearlyReport'])->name('search-admission-fees-by-year');



//Schoolfees Collections Reporting

Route::get('/schoolfees/collections/report', [SchoolFeesReportController::class, 'SchoolfeesCollectionsReport'])->name('schoolfees.collections.report');

Route::post('/search/schoolfees/termly/report',[SchoolFeesReportController::class,'SchoolfeesTermlyReport'])->name('search-schoolfees-collection-by-term');

Route::post('/search/schoolfees/yearly/report',[SchoolFeesReportController::class,'SchoolfeesYearlyReport'])->name('search-schoolfees-collection-by-year');




//Expense Categories

Route::get('/view/expense/categories', [ExpenseController::class, 'ViewExpenseCategory'])->name('view.expense.categories');

Route::post('/expense/categories/store', [ExpenseController::class, 'ExpenseCategoryStore'])->name('expense.category.store');

Route::get('/expense/category/edit/{id}', [ExpenseController::class, 'EditExpenseCategory']);

Route::post('/expense-category-update', [ExpenseController::class, 'ExpenseCategoryUpdate']);





// All Expense Informations

Route::get('/view/expenses/information', [ExpenseController::class, 'ViewExpenses'])->name('view.expenses');

Route::post('/expense/store', [ExpenseController::class, 'ExpenseFeesStore'])->name('expense.fees.store');

Route::get('/expense/fees/edit/{id}', [ExpenseController::class, 'ExpenseFeesEdit'])->name('expense.fees.edit');

Route::post('/expense-fees-update/{id}', [ExpenseController::class, 'ExpenseFeesUpdate'])->name('expense.fees.update');

Route::get('/expense/fees/details/{invoice_no}', [ExpenseController::class, 'ViewExpenseFeesDetails'])->middleware(['auth','verified'])->name('expense.fees.details');

Route::get('/view/expenses/information/filter', [ExpenseController::class, 'ViewExpenseFeesFilter'])->name('view.expenses.filter');

Route::get('/expense/information/report/print/{id}', [ExpenseController::class, 'ViewExpenseReportPrint'])->name('expense.information.report.print');




//Expense Fees Payments 


Route::get('/expense/fee/track/invoice/{invoice_no}', [ExpenseController::class, 'ExpenseFeesTrackInvoice'])->name('expense.fees.track.invoice'); 


Route::post('/expense/fees/topup/payment/{invoice_no}', [ExpenseController::class, 'SubmitExpenseFeesTopup'])->name('expense.fees.topup.payment');


Route::get('/expense/fees/topup/payment/invoice/{id}', [ExpenseController::class, 'ExpenseTopupPaymentInvoice'])->name('expense.fees.topup.payment.invoice'); 

Route::get('/expense/fees/topup/payment/delete/{id}', [ExpenseController::class, 'ExpenseFeesTopupPaymentDelete'])->name('delete.expense.fees.topup.payment'); 



//Expenses Reporting

Route::get('/school/expenses/report', [ExpenseReportController::class, 'SchoolExpensesReport'])->name('view.expenses.reports');


Route::post('/search/school/expenses/termly/report',[ExpenseReportController::class,'SchoolTermlyExpenseReport'])->name('search-school-expenses-by-term');

Route::post('/search/school/expenses/yearly/report',[ExpenseReportController::class,'SchoolYearlyExpenseReport'])->name('search-school-expenses-by-year');



Route::post('/search/expense/category/termly/report',[ExpenseReportController::class,'ExpenseCategoryTermlyReport'])->name('search-school-expense-category-by-term');

Route::post('/search/expense/category/yearly/report',[ExpenseReportController::class,'ExpenseCategoryYearlyReport'])->name('search-school-expense-category-by-year');





//Purchases Section


Route::controller(PurchasesController::class)->group(function() {



/// PURCHASES Stock Information Routes  ///


Route::get('/view/all/purchases','ViewAllPurchases')->name('view.all.purchases');

Route::get('/view/purchases/filter','ViewPurchasesFilter')->name('view.purchases.filter');

Route::post('/submit/purchase/information','SubmitPurchaseInfo')->name('store.purchase.information');

Route::get('/edit/purchase/information/{id}','EditPurchaseInfo');

Route::post('/update-purchase-information','UpdatePurchaseInfo');

Route::get('/purchase/information/report/{id}',  'PurchaseInfoReport')->name('purchase.information.report');

Route::get('/purchase/details/{id}','ViewPurchaseDetails')->middleware(['auth','verified'])->name('purchase.details');



Route::get('view/purchase/items','ViewPurchaseItemList')->name('view.purchase.items');

Route::post('purchase/items/store','StorePurchaseItem')->name('store.purchase.items');

Route::get('/purchase/items/edit/{id}','EditPurchaseItem');

Route::post('/purchase-items-update','UpdatePurchaseItem');



Route::get('view/purchase/items/category','ViewPurchaseItemCategoryList')->name('view.purchase.item.categories');

Route::post('/store/purchase/item/category','StorePurchaseItemCategory')->name('store.purchase.item.category');

Route::get('/purchase/item/category/edit/{id}','EditPurchaseItemCategory');

Route::post('/purchase-item-category-update','UpdatePurchaseItemCategory');





});// Purchases




Route::controller(PurchasesReportController::class)->group(function() {


///Purchase Reports ///
Route::get('/purchases/reports/view','ViewPurchaseReports')->name('view.purchases.reports');

Route::post('/purchases/report/search/by/term','PurchasesReportByTerm')->name('search-purchases-report-by-term-year');

Route::post('/purchases/report/search/by/year', 'PurchasesReportByYears')->name('search-purchases-report-by-year');



Route::post('/search/purchase/item/termly/report','PurchaseItemTermlyReport')->name('search-purchase-item-by-term');

Route::post('/search/purchase/item/yearly/report','PurchaseItemYearlyReport')->name('search-purchase-item-by-year');



});// Purchases Reports





Route::controller(IncomeStatementController::class)->group(function() {


///Income statement Reports ///
Route::get('/income/statement/reports/view','ViewIncomeStatementReports')->name('income.statement.reports');

Route::post('/income/statement/report/search/by/term','IncomeStatementReportByTerm')->name('search-income-statement-report-by-term-year');

Route::post('/income/statement/report/search/by/year', 'IncomeStatementReportByYears')->name('search-income-statement-report-by-year');

});// Income statement Reports



///School Tours $ Travels Routes///

Route::controller(SchoolToursController::class)->group(function() {


///School Tours $ Travels Routes///
Route::get('/tours/travels/dashboard','ViewToursTravelDash')->name('tours.travels.dashboard');

Route::get('/tour/packages','viewTourPackages')->name('school.tour.packages');


Route::get('/filter/tour/packages','FilterTourPackages')->name('filter.tour.packages');

Route::get('/tour/packages/filtered','TourPackagesFilterd')->name('tour.packages.filtered');

Route::get('/tour/package/details/{id}','tourPackageDetails')->name('tour.package.details');


Route::get('/tour/agency/package/details/{id}','tourAgencyPackageDetails')->name('tour.agency.package.details');

Route::get('/tour/agency/packages/filtered','TourAgencyPackagesFilterd')->name('tour.agency.packages.filtered');


});




Route::controller(TourCartController::class)->group(function() {


///School Tour Cart Routes///
Route::get('/view/tours/cart','ViewTourCart')->name('view.tour.cart');

Route::post('/tours/cart/store','addTotourCart')->name('add.to.tour.cart');

Route::get('/students/quantity/increment/{id}','IncreStudentQtyCart')->name('tour.cart.students.qty.increment');

Route::get('/students/quantity/decrement/{id}','DecreStudentQtyCart')->name('tour.cart.students.qty.decrement');

Route::get('/adults/quantity/increment/{id}','IncreAdultQtyCart')->name('tour.cart.adults.qty.increment');

Route::get('/adults/quantity/decrement/{id}','DecreAdultQtyCart')->name('tour.cart.adults.qty.decrement');

Route::delete('/tour/cart/remove','removeTourCart')->name('tour.cart.remove');

Route::delete('/tour/cart/clear','clearTourCart')->name('tour.cart.clear');




});





Route::controller(TourBookingsController::class)->group(function() {


///School Tour Bookings Routes///
Route::get('/view/tour/bookings','ViewTourBookings')->name('view.tour.bookings');

Route::post('/submit/tour/bookings','SubmitTourBookings')->name('submit.tour.bookings');

Route::get('/tour/bookings/details/{booking_id}','TourBookingDetails')->name('tour.bookings.details');

Route::get('/tour/bookings/report/details/{booking_id}','TourBookingReportInvoice')->name('tour.bookings.invoice.report.details');

Route::get('/cancel/tour/bookings/{id}','CancelTourBookings')->name('cancel.tour.bookings');



});




// Checkout Routes 

Route::get('/tour/checkout', [TourCheckoutController::class, 'TourCheckoutCreate'])->name('tour.checkout');

Route::post('/tour/checkout/store', [TourCheckoutController::class, 'TourCheckoutStore'])->name('tour.checkout.store');


//Tour Reviews //
Route::post('/store/review', [ReviewController::class, 'StoreReview'])->name('store.review');











///School Bus Rentals Routes///

Route::controller(CarRentalsController::class)->group(function() {


Route::get('/bus/rentals/dashboard','ViewBusRentalsDash')->name('school.car.rentals.dashboard');

Route::get('/bus/rentals','viewBusRentals')->name('school.car.rentals');


Route::get('/filter/bus/rentals','FilterBusRentals')->name('filter.car.rentals');

Route::get('/bus/rentals/filtered','BusRentalsFilterd')->name('car.rentals.filtered');

Route::get('/bus/rentals/details/{id}','BusRentalDetails')->name('school.car.rentals.details');


Route::get('/bus/rental/operator/details/{id}','BusRentalOperatorDetails')->name('bus.rental.operator.details');

Route::get('/bus/rental/operator/filtered','BusRentalOperatorFilterd')->name('bus.rental.operator.filtered');


});






Route::controller(CartController::class)->group(function() {


///School Bus Rentals Cart Routes///
Route::get('/view/bus/rentals/cart','ViewBusRentalsCart')->name('view.car.rental.cart');

Route::post('/bus/rentals/cart/store','addToRentalCart')->name('add.to.car.rental.cart');


Route::delete('/bus/rentals/cart/remove','removeRentalCart')->name('car.rental.cart.remove');

Route::delete('/bus/rentals/cart/clear','clearRentalCart')->name('car.rental.cart.clear');




});





Route::controller(CarRentalsController::class)->group(function() {


///School Bus Rentals Bookings Routes///
Route::get('/view/bus/rentals/bookings','ViewBusRentalsBookings')->name('view.bus.rental.bookings');

Route::post('/submit/bus/rentals/bookings','SubmitBusRentalsBookings')->name('submit.bus.rental.bookings');

Route::get('/bis/rentals/bookings/details/{booking_id}','BusRentalBookingDetails')->name('bus.rentals.bookings.details');

Route::get('/bus/rentals/bookings/report/details/{booking_id}','BusRentalBookingReportInvoice')->name('bus.rentals.bookings.invoice.report.details');

Route::get('/cancel/bus/rental/bookings/{id}','CancelBusRentalBookings')->name('cancel.bus.rentals.bookings');



});



//Bus Rentals Checkout Routes 

Route::get('/bus/rental/checkout', [CarRentalCheckoutController::class, 'BusRentalCheckoutCreate'])->name('bus.rental.checkout');

Route::post('/bus/rental/checkout/store', [CarRentalCheckoutController::class, 'BusRentalCheckoutStore'])->name('bus.rental.checkout.store');



//Bus Rental Booking Payments
Route::get('/rental/booking/payments', [CarRentalCheckOutController::class, 'BusRentalBookingPayments'])->name('view.rental.booking.payments');


//Bus Rental Booking Payments
Route::get('/tour/booking/payments', [TourBookingsController::class, 'SchoolTourBookingsPayments'])->name('view.tour.booking.payments');



//School Ecommerce Orders Payments
Route::get('/orders/payments', [OrderController::class, 'OrdersPayments'])->name('view.orders.payments');




});// end school auth middleware











// Students auth middleware

Route::middleware(['auth:sanctum,student', config('jetstream.auth_session'), 'verified'])->group(function () {

Route::get('/student/dashboard', function () {
return view('students.body.index');})->name('student.dashboard');
});



// Students auth middleware




///Google Drive Account///




Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google.drive.redirect');
 
Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('github')->user();
 
    $user = Students::updateOrCreate([
        'github_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
});





Route::get('/google/redirect', [GoogleDriveController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleDriveController::class, 'handleGoogleCallback'])->name('google.callback');
Route::get('/google/files', [GoogleDriveController::class, 'listFiles'])->name('google.drive.files');


Route::group(['prefix' => 'student','middleware' =>['auth:student']],function(){



Route::get('/logout',[StudentUserController::class,'destroy'])->name('student.logout');
Route::get('/user/profile',[StudentProfileController::class,'StudentUserprofile'])->name('student.user.profile.view');
Route::post('/profile/update',[StudentProfileController::class,'profileUpdate'])->name('student.profile.update');
Route::post('/update/password',[StudentProfileController::class,'studentpassUpdate'])->name('student.password.update');


//Dropbox account//



Route::group(['middleware' => ['web', 'DropboxAuthenticated']], function(){
    Route::get('dropbox', function(){
        return Dropbox::post('users/get_current_account');
    })->name('my.dropbox.account');
});

Route::get('dropbox/connect', function(){
    return Dropbox::connect();
});

Route::get('dropbox/disconnect', function(){
    return Dropbox::disconnect('app/dropbox');
});




///All MY Files


Route::get('/view/all/my/files', [FilesController::class, 'ViewMyFiles'])->name('view.my.files');



//Students Acadermic / Other Documents Routes

Route::get('/view/files', [FilesController::class, 'ViewFiles'])->name('view.files');


Route::get('/view/files/board', [FilesController::class, 'ViewFilesBoard'])->name('view.files.board');


Route::post('/store/files', [FilesController::class, 'StoreFile'])->name('file.store');


Route::get('/edit/file/{id}', [FilesController::class, 'EditFile'])->name('edit.file');
Route::post('/update/file/{id}', [FilesController::class, 'UpdateFile'])->name('file.update');


Route::get('/file/delete/{id}', [FilesController::class, 'DeleteFile'])->name('delete.file');




//Student Folders Section 

Route::post('/store/academic/folder', [FolderController::class, 'StoreAcademicFolder'])->name('academic.folder.store');

Route::get('/academic/folder/delete/{id}', [FolderController::class, 'DeleteAcademicFolder'])->name('delete.academic.folder');

Route::get('/academic/folder/view-modal/{id}',[FolderController::class,'folderViewAjax']); 

Route::post('/update-academic-folder',[FolderController::class,'updateAcademicFolder']);



Route::post('/store/medical/folder', [FolderController::class, 'StoreMedicalFolder'])->name('medical.folder.store');

Route::get('/medical/folder/delete/{id}', [FolderController::class, 'DeleteMedicalFolder'])->name('delete.medical.folder');

Route::get('/medical/folder/view-modal/{id}',[FolderController::class,'MedicalfolderViewAjax']); 

Route::post('/update-medical-folder',[FolderController::class,'updateMedicalFolder']);





});//End of Students Middleware







// Tour operators auth middleware

Route::middleware(['auth:sanctum,touroperator', config('jetstream.auth_session'), 'verified'])->group(function () {

Route::get('/touroperator/dashboard', function () {
return view('tours_travels.body.index');})->name('tour.operator.dashboard');
});



// Tour operators auth middleware
Route::group(['prefix' => 'touroperator','middleware' =>['auth:touroperator']],function(){


Route::get('/logout',[TourOperatorUserController::class,'destroy'])->name('operator.logout');
Route::get('/user/profile',[TourAdminController::class,'Userprofile'])->name('operator.user.profile.view');
Route::post('/profile/update',[TourAdminController::class,'profileUpdate'])->name('operator.profile.update');
Route::post('/update/password',[TourAdminController::class,'passwordUpdate'])->name('operator.password.update');


///Tour Packages Section 

Route::get('/view/tour/package',[ToursTravelsController::class,'viewTourPackages'])->name('view.tour.package');
Route::get('/add/new/tour/package',[ToursTravelsController::class,'addTourPackages'])->name('add.tour.package');
Route::post('/store/tour/package',[ToursTravelsController::class,'storeTourPackage'])->name('tour.package.store');
Route::get('/edit/tour/package/{id}',[ToursTravelsController::class,'editTourPackage'])->name('tour.package.edit');
Route::post('/update/tour/package',[ToursTravelsController::class,'updateTourPackage'])->name('tour.package.update');
Route::post('/update/tour/multi/images',[ToursTravelsController::class,'updateTourMultiImage'])->name('tour.multi.image.update');
Route::get('/delete/tour/package/{id}',[ToursTravelsController::class,'deleteTourPackage'])->name('tour.package.delete');
Route::get('/delete/tour/multi/images/{id}',[ToursTravelsController::class,'deleteTourMultiImage'])->name('tour.multi.image.delete');

Route::get('/deactivate/tour/package/{id}',[ToursTravelsController::class,'deactivateTourPackage'])->name('tour.package.deactivate');

Route::get('/activate/tour/package/{id}',[ToursTravelsController::class,'activateTourPackage'])->name('tour.package.activate');


//School Tour Bookings Routes



Route::get('/school/tours/bookings', [SchoolTourBookingController::class, 'SchoolToursBookings'])->name('school-tours-bookings');

Route::get('/tours/bookings/information/{booking_id}', [SchoolTourBookingController::class, 'TourBookingDetails'])->name('tour.bookings.information');

Route::get('/tours/bookings/invoice/{booking_id}', [SchoolTourBookingController::class, 'TourBookingInvoice'])->name('tour.bookings.invoice');


Route::get('/yearly/tour/bookings/reports', [SchoolTourBookingController::class, 'ViewYearlyTourBookingsReports'])->name('tour.bookings.reports');

Route::post('tour/bookings/report/by/year',[SchoolTourBookingController::class,'TourBookingsReportsByYear'])->name('search-tour-booking-by-year');



// Instructor Review All Route 
Route::controller(ReviewController::class)->group(function(){
Route::get('/all/tour/reviews','AllTourReviews')->name('tour.all.review');  

});


});
//End of Tour operators Middleware






}); // end of prevent-back-history middleware