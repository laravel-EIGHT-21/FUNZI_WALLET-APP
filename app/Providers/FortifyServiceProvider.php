<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

use Illuminate\Contracts\Auth\StatefulGuard;
use App\Actions\Fortify\AdminAttemptToAuthenticate;
use App\Actions\Fortify\AdminRedirectIfTwoFactorAuthenticatable;

use App\Actions\Fortify\StudentsAttemptToAuthenticate;
use App\Actions\Fortify\StudentsRedirectIfTwoFactorAuthenticatable;

use App\Actions\Fortify\TourOperatorsAttemptToAuthenticate;
use App\Actions\Fortify\TourOperatorsRedirectIfTwoFactorAuthenticatable;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\StudentUserController;
use App\Http\Controllers\TourOperatorUserController;;
use Illuminate\Support\Facades\Auth;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        


$this->app->when([AdminUserController::class,AdminAttemptToAuthenticate::class,AdminRedirectIfTwoFactorAuthenticatable::class])->needs(StatefulGuard::class)->give(function (){
return Auth::guard('admin');
});





$this->app->when([TourOperatorUserController::class,TourOperatorsAttemptToAuthenticate::class,TourOperatorsRedirectIfTwoFactorAuthenticatable::class])->needs(StatefulGuard::class)->give(function (){
return Auth::guard('touroperator');
});




$this->app->when([StudentUserController::class,StudentsAttemptToAuthenticate::class,StudentsRedirectIfTwoFactorAuthenticatable::class])->needs(StatefulGuard::class)->give(function (){
return Auth::guard('student');
});








    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
