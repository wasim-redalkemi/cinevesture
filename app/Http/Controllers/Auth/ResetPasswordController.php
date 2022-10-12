<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OtpController;
use App\Models\User;
use App\Notifications\VerifyOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // return $response == Password::PASSWORD_RESET
        //             ? $this->sendResetResponse($request, $response)
        //             : $this->sendResetFailedResponse($request, $response);

        return redirect('login')->with('success', 'Password reset successfully. Please Login.');
    }


    // reset password otp views
    public function createResetOtp()
    {
        $user = User::find(auth()->user()->id);
        $otp = OtpController::createOtp($user, 'R'); // F for Forgot pasword
        $collect  = collect();
        $collect->put('otp', $otp);
        $user->notify(new VerifyOtp($collect));
        $type = 'R'; // R for reset 
        return redirect()->route('password-reset-otp')->with('success', 'OTP send successfully to your email.');
    }

    public function restPasswordOtpView()
    {
        return view('userverification.reset_password');
    }

    // reset password View
    public function restPasswordView()
    {
        return view('userverification.password_change');
    }

    public function resetPasswordCreate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $this->setUserPassword($user, $request->password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        return redirect()->route('setting-page')->with('success', 'Password reset successfully.');
    }
}
