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
return view('auth.landing');
});   


Route::middleware('admin:admin')->group(function () {
Route::get('admin/login', [AdminUserController::class, 'loginForm']);
Route::post('admin/login', [AdminUserController::class, 'store'])->name('admin.login');
});




Route::middleware('student:student')->group(function () {
Route::get('student/login', [StudentUserController::class, 'loginForm']);
Route::post('student/login', [StudentUserController::class, 'store'])->name('student.login');
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


///Order Payments///

Route::post('/school/orders/payment/{order_id}', [OrdersController::class, 'SchoolOrdersPayment'])->name('order.balance.topup.payment');

Route::get('/offline/orders/track/invoice/{order_id}', [OrdersController::class, 'OfflineOrdersTrackInvoice'])->name('offline.orders.track.invoice'); 

Route::get('/offline/order/payment/invoice/{id}', [OrdersController::class, 'OfflineOrderPaymentInvoice'])->name('offline.order.payment.invoice'); 

Route::get('/offline/order/payment/delete/{id}', [OrdersController::class, 'OfflineOrderPaymentDelete'])->name('delete.offline.order.payment'); 





// Update Order Status 
Route::get('/pending/to/confirmed/{order_id}', [OrdersController::class, 'PendingToConfirm'])->name('pending-confirm');

Route::get('/confirm/to/shipped/{order_id}', [OrdersController::class, 'ConfirmToShipped'])->name('confirm.shipped');

Route::get('/shipped/to/delivered/{order_id}', [OrdersController::class, 'ShippedToDelivered'])->name('shipped.delivered');





//School Tour Booking & Packages

Route::get('/view/all/tour/packages', [SchoolTourBookingsController::class, 'SchoolTourPackages'])->name('all.school.tour.packages');

Route::get('/add/new/tour/package',[ToursTravelsController::class,'addTourPackages'])->name('add.tour.package');
Route::post('/store/tour/package',[ToursTravelsController::class,'storeTourPackage'])->name('tour.package.store');
Route::get('/edit/tour/package/{id}',[ToursTravelsController::class,'editTourPackage'])->name('tour.package.edit');
Route::post('/update/tour/package',[ToursTravelsController::class,'updateTourPackage'])->name('tour.package.update');
Route::post('/update/tour/multi/images',[ToursTravelsController::class,'updateTourMultiImage'])->name('tour.multi.image.update');
Route::get('/delete/tour/package/{id}',[ToursTravelsController::class,'deleteTourPackage'])->name('tour.package.delete');
Route::get('/delete/tour/multi/images/{id}',[ToursTravelsController::class,'deleteTourMultiImage'])->name('tour.multi.image.delete');


Route::get('/tour/deactivate/{id}',[ToursTravelsController::class,'deactivateTourPackage'])->middleware(['auth','verified'])->name('tour.deactivate');

Route::get('/tour/activate/{id}',[ToursTravelsController::class,'activateTourPackage'])->middleware(['auth','verified'])->name('tour.activate');



//Tour Activities
Route::controller(ToursTravelsController::class)->group(function(){

Route::get('/edit/tour/activity/{id}', 'EditTourActivity');
Route::post('/update/tour/activity', 'UpdateTourActivity');

Route::post('/store/tour/activies/{id}', 'StoreTourActivity')->name('store.tour.activities');

Route::get('/delete/tour/activity/{id}', 'DeleteTourActivity')->name('delete.tour.activity');

});







Route::get('/tour/details/{id}',[SchoolTourBookingsController::class,'tourPackageDetails'])->name('tour.details');



Route::get('/tour/bookings/details/{booking_id}', [SchoolTourBookingsController::class, 'SchoolTourBookingDetails'])->name('school.tour.bookings.details');

Route::get('/pending/tour/bookings', [SchoolTourBookingsController::class, 'PendingBookings'])->name('pending-tour-bookings');

Route::get('/confirmed/tour/bookings', [SchoolTourBookingsController::class, 'ConfirmedBookings'])->name('confirmed-tour-bookings');

Route::get('/cancelled/tour/bookings', [SchoolTourBookingsController::class, 'CancelledBookings'])->name('cancelled-tour-bookings');

Route::get('/tour/bookings/invoice/{booking_id}', [SchoolTourBookingsController::class, 'SchoolTourBookingInvoice'])->name('school.tour.bookings.invoice');


Route::get('/tour/bookings/payments', [SchoolTourBookingsController::class, 'SchoolTourBookingsPayments'])->name('tour-bookings-payments');



///Tour Booking Payments///

Route::post('/school/tour/booking/payment/{booking_id}', [SchoolTourBookingsController::class, 'SchoolTourBookingPayment'])->name('tour.booking.topup.payment');

Route::get('/tour/booking/track/invoice/{booking_id}', [SchoolTourBookingsController::class, 'TourBookingTrackInvoice'])->name('tour.booking.payments.track.invoice'); 

Route::get('/tour/booking/payment/invoice/{id}', [SchoolTourBookingsController::class, 'TourBookingPaymentInvoice'])->name('tour.booking.payment.invoice'); 

Route::get('/tour/booking/payment/delete/{id}', [SchoolTourBookingsController::class, 'TourBookingPaymentDelete'])->name('delete.tour.booking.payment'); 




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






///Rentals Booking Payments///

Route::post('/rentals/booking/payment/{booking_id}', [CarRentalCheckOutController::class, 'SchoolRentalBookingPayment'])->name('rental.booking.topup.payment');

Route::get('/rentals/booking/track/invoice/{booking_id}', [CarRentalCheckOutController::class, 'RentalBookingTrackInvoice'])->name('rental.booking.payments.track.invoice'); 

Route::get('/rentals/booking/payment/invoice/{id}', [CarRentalCheckOutController::class, 'RentalBookingPaymentInvoice'])->name('rental.booking.payment.invoice'); 

Route::get('/rentals/booking/payment/delete/{id}', [CarRentalCheckOutController::class, 'RentalBookingPaymentDelete'])->name('delete.rental.booking.payment'); 




///Rental Vehicles 

Route::controller(CarRentalsController::class)->group(function(){

    
Route::get('/view/all/bus/rentals', 'AllBusRentals')->name('view.all.bus.rentals');

Route::get('/edit/vehicle/{id}', 'EditVehicle');
Route::post('/update/vehicle', 'UpdateVehicle');

Route::post('/store/vehicle/{id}', 'StoreVehicle')->name('store.vehicle');

Route::get('/delete/vehicle/{id}', 'DeleteVehicle')->name('delete.vehicle');

});




///Transportation Routes
/*
Route::controller(CarRentalsController::class)->group(function(){

Route::get('/edit/route/{id}', 'EditRoute');
Route::post('/update/route', 'UpdateRoute');

Route::post('/store/route/{id}', 'StoreRoute')->name('store.route');

Route::get('/delete/route/{id}', 'DeleteRoute')->name('delete.route');

});
*/







//Orders Reports    
///Route::get('/weekly/orders/reports', [OrderReportsController::class, 'ViewWeeklyOrdersReports'])->name('weekly.orders.reports');

Route::get('/monthly/orders/reports', [OrderReportsController::class, 'ViewMonthlyOrdersReports'])->name('monthly.orders.reports');

Route::get('/yearly/orders/reports', [OrderReportsController::class, 'ViewYearlyOrdersReports'])->name('yearly.orders.reports');


///Route::post('orders/report/search/by/week',[OrderReportsController::class,'OrdersReportsByWeek'])->name('search-orders-by-week');

Route::post('orders/report/search/by/month',[OrderReportsController::class,'OrdersReportsByMonth'])->name('search-orders-by-month');

Route::post('orders/report/search/by/year', [OrderReportsController::class,'OrdersReportsByYear'])->name('search-orders-by-year');

Route::get('/order/details/report/{order_id}', [OrderReportsController::class, 'ViewOrderReportDetails'])->name('order.details.invoice.report');




//All School Tour Bookings Reports
Route::get('/all/yearly/tour/bookings/reports', [SchoolTourBookingsController::class, 'ViewAllYearlyTourBookingsReports'])->name('all.tour.bookings.reports');

Route::post('/all/tour/bookings/report/by/year',[SchoolTourBookingsController::class,'AllTourBookingsReportsByYear'])->name('search-school-tour-booking-by-year');





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
Route::get('/ecommerce',[ShopController::class,'ViewEcommerceDash'])->name('school.ecommerce.dashboard');

Route::get('/product/details/{id}/{product_name}',[ShopController::class,'productDetails'])->name('product.details');

Route::get('/view/cart/products',[CartController::class,'ViewCart'])->name('view.cart');

Route::post('/cart/product/store',[CartController::class,'addToCart'])->name('add.to.cart');

Route::get('/cart/quantity/increment/{id}',[CartController::class,'updateCartQty'])->name('cart.qty.increment');

Route::get('/cart/quantity/decrement/{id}',[CartController::class,'decreCartQty'])->name('cart.qty.decrement');

Route::delete('/cart/remove',[CartController::class,'removeCart'])->name('cart.remove');

Route::delete('/delete/from/cart',[CartController::class,'deleteFromCart'])->name('delete.from.cart');

Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');



// Product Search Route 
Route::post('/search', [ShopController::class, 'ProductSearch'])->name('product.search');


// Advance Search Routes 
Route::post('search-product', [ShopController::class, 'SearchProduct']);


// Shop Page Route 
Route::get('/shop/by/categories', [ShopController::class, 'ShopPage'])->name('shopping.filter.page');

Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shopping.filtered');






// School Orders

Route::post('/submit/orders', [OrderController::class, 'SubmitOrders'])->name('submit.orders');


//Route::post('/submit/credits/orders', [OrderController::class, 'SubmitCreditOrders'])->name('submit.credit.orders');


Route::get('/view/my/orders', [OrderController::class, 'MyOrders'])->name('view.school.orders');

Route::get('/order/details/{order_id}', [OrderController::class, 'OrderDetails'])->name('school.order.details'); 

Route::get('/cancel/order/{order_id}', [OrderController::class, 'CancelOrder'])->name('cancel.order');


Route::get('/offline/order/payment/track/invoice/{order_id}', [OrderController::class, 'OfflineOrderPaymentTrackInvoice'])->name('offline.order.payments.track.invoice'); 


 
// Checkout Routes 

Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


//Route::post('/checkout/credit/order/store', [CheckoutController::class, 'CheckoutCreditStore'])->name('checkoutcredit.store');



//Report Orders 
Route::get('/order/report/details/{order_id}', [OrderController::class, 'ViewOrderReportInvoice'])->name('order.invoice.report.details');


//Orders Reports    

Route::get('/monthly/school/orders/reports', [SchoolOrdersReportController::class, 'ViewMonthlyOrdersReports'])->name('school.monthly.orders.reports');

Route::get('/yearly/school/orders/reports', [SchoolOrdersReportController::class, 'ViewYearlyOrdersReports'])->name('school.yearly.orders.reports');


Route::post('/search/school/orders/report/by/month',[SchoolOrdersReportController::class,'OrdersReportsByMonth'])->name('search-school-orders-by-month');

Route::post('/search/school/orders/report/by/year', [SchoolOrdersReportController::class,'OrdersReportsByYear'])->name('search-school-orders-by-year');




//School Orders Information
Route::get('/orders/general/information', [OrderController::class, 'OrderGeneralInfo'])->name('school.orders.general.info');


//School Orders Payment Records  
Route::get('/orders/payemnt/records', [OrderController::class, 'OrderPaymentsRecords'])->name('order.payment.records');












///School Tours $ Travels Routes///

Route::controller(SchoolToursController::class)->group(function() {


///School Tours $ Travels Routes///
Route::get('/tours/travels','ViewToursTravelDash')->name('tours.travels.dashboard');

Route::get('/tour/packages','viewTourPackages')->name('school.tour.packages');


Route::get('/filter/tour/packages','FilterTourPackages')->name('filter.tour.packages');

Route::get('/tour/packages/filtered','TourPackagesFilterd')->name('tour.packages.filtered');

Route::get('/tour/package/details/{id}','tourPackageDetails')->name('tour.package.details');


Route::get('/tour/agency/package/details/{id}','tourAgencyPackageDetails')->name('tour.agency.package.details');

Route::get('/tour/agency/packages/filtered','TourAgencyPackagesFilterd')->name('tour.agency.packages.filtered');


});


// Product Search Route 
Route::post('/search/tour', [SchoolToursController::class, 'TourSearch'])->name('tour.search');


// Advance Search Routes 
Route::post('search-tour', [SchoolToursController::class, 'SearchTour']);


// Shop Page Route 
Route::get('/filter/by/tour/regions', [SchoolToursController::class, 'ShopPage'])->name('tours.filter.page');

Route::post('/tours/filter', [SchoolToursController::class, 'ShopFilter'])->name('tours.filtered');





Route::controller(TourCartController::class)->group(function() {


///School Tour Cart Routes///
Route::get('/view/tours/cart','ViewTourCart')->name('view.tour.cart');

Route::post('/tours/cart/store','addTotourCart')->name('add.to.tour.cart');

Route::get('/students/quantity/increment/{id}','IncreStudentQtyCart')->name('tour.cart.students.qty.increment');

Route::get('/students/quantity/decrement/{id}','DecreStudentQtyCart')->name('tour.cart.students.qty.decrement');

Route::get('/adults/quantity/increment/{id}','IncreAdultQtyCart')->name('tour.cart.adults.qty.increment');

Route::get('/adults/quantity/decrement/{id}','DecreAdultQtyCart')->name('tour.cart.adults.qty.decrement');

Route::delete('/tour/cart/remove','removeTourCart')->name('tour.cart.remove');

Route::delete('/delete/tour/cart','deleteTourFromCart')->name('delete.tour.cart');


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




//School Tours Booking General Information
Route::get('/tour/booking/general/information', [TourBookingsController::class, 'TourBookingsGeneralInfo'])->name('view.tour.bookings.info');




//Orders Reports    

Route::get('/annual/tours/reports', [TourBookingsController::class, 'AnnualTourReports'])->name('school.annual.tours.reports');

Route::get('/annual/bus/rentals/reports', [TourBookingsController::class, 'AnnualBusRentalsReports'])->name('school.annual.bus.rentals.reports');


Route::post('/search/annual/school/tours/report',[TourBookingsController::class,'ToursAnnualReport'])->name('search-annual-school-tour');

Route::post('/search/annual/school/bus/rentals/report', [TourBookingsController::class,'BusRentalsAnnualReports'])->name('search-annual-school-bus-rental');





///School Bus Rentals Routes///

Route::controller(CarRentalsController::class)->group(function() {


Route::get('/bus/rentals','ViewBusRentalsDash')->name('school.car.rentals.dashboard');

//Route::get('/bus/rentals','viewBusRentals')->name('school.car.rentals');


Route::get('/filter/bus/rentals','FilterBusRentals')->name('filter.car.rentals');

Route::get('/bus/rentals/filtered','BusRentalsFilterd')->name('car.rentals.filtered');

Route::get('/bus/rentals/details/{id}','BusRentalDetails')->name('school.car.rentals.details');


Route::get('/bus/rental/operator/details/{id}','BusRentalOperatorDetails')->name('bus.rental.operator.details');

Route::get('/bus/rental/operator/filtered','BusRentalOperatorFilterd')->name('bus.rental.operator.filtered');


});




// Rental Search Route 
Route::post('/search/rental', [CarRentalsController::class, 'BusRentalSearch'])->name('bus.rental.search');


// Advance Search Routes 
Route::post('search-rental', [CarRentalsController::class, 'SearchBusRental']);






Route::controller(CartController::class)->group(function() {


///School Bus Rentals Cart Routes///
Route::get('/view/bus/rentals/cart','ViewBusRentalsCart')->name('view.car.rental.cart');

Route::post('/bus/rentals/cart/store','addToRentalCart')->name('add.to.car.rental.cart');


Route::delete('/bus/rentals/cart/remove','removeRentalCart')->name('car.rental.cart.remove');


Route::delete('/delete/bus/rental/cart','deleteBusRentalCart')->name('delete.car.rental.cart');


Route::delete('/bus/rentals/cart/clear','clearRentalCart')->name('car.rental.cart.clear');


Route::get('/rentals/vehicles/increment/{id}','IncreVehiclesCart')->name('vehicles.increment');

Route::get('/rentals/vehicles/decrement/{id}','DecreVehiclesCart')->name('vehicles.decrement');

Route::get('/rentals/days/increment/{id}','IncreRentalDaysCart')->name('days.increment');

Route::get('/rental/days/decrement/{id}','DecreRentalDaysCart')->name('days.decrement');





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
Route::get('/rental/booking/payments', [CarRentalCheckOutController::class, 'BusRentalBookingPayments'])->name('view.bus.rental.bookings.info');



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






}); // end of prevent-back-history middleware