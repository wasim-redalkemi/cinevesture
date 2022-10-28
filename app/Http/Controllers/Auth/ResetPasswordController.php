<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OtpController;
use App\Models\User;
use App\Notifications\VerifyOtp;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
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
        // $validator = Validator::make($request->all(), [
        //     // 'email'=>'required|exists:users,email',
        //     'password' => 'required|string|min:8|confirmed',
        //     'password_confirmation' => 'required|string||min:8'
        // ]);
        // if ($validator->fails()) {
        //     return back()->withErrors($validator->errors()->messages())->withInput();
        // }
       
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
        $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);

    }

     /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse(['message' => trans($response)], 200);
        }

        return redirect($this->redirectPath())
                            ->with('status', trans($response));
    }

        /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);

    }


    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request,$token)
    {
        //$token = $request->route()->parameter('token');

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
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

    // reset password public view 
    public function restPasswordPublicView(Request $request)
    {   $token = $request->token;
        $email = $request->email;
        return view('auth.passwords.reset',compact(['token','email']));
    }

    public function resetPasswordCreate(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string||min:8'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->messages())->withInput();
        }
        $user = User::find(auth()->user()->id);
        $this->setUserPassword($user, $request->password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        return redirect()->route('setting-page')->with('success', 'Password reset successfully.');
    }
}
