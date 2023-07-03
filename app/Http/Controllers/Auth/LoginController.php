<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\OtpUtilityController;
use App\Models\MasterPlanModule;
use App\Models\MasterPlanOperation;
use App\Models\Plans;
use App\Models\User;
use App\Models\UserSubscription;
use App\Notifications\VerifyOtp;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('website.auth.login');
    }


     /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
       
            $user = User::query()->with('getSubcription')->where('email',$request->email)->first();
            if(isset($user->user_type) && $user->user_type == 'A'){
                return back()->with('error','Invalid credentials.');
            }
            if(isset($user->status) && $user->status == 0){
                return back()->with('error','Your account has been suspended,please contact support.');
            }
            if(isset($user) && (empty($user->password))){
                return back()->with('error','Invalid credential.');
            }
            if(!isset($user)){
                return back()->with('error','Your account does not exist.');
            }
           
            if (!$user->email_verified_at) {
                $otp = OtpUtilityController::createOtp($user,'S'); // S for signup and verify otp.
                $collect  = collect();
                $collect->put('otp',$otp);
                $user->notify(new VerifyOtp($collect));
                return redirect()->route('otp-view', ['email' =>$user->email,'type'=>'S']);
            }
        
        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
                if($user->getSubcription){
                    $plans = Plans::query()->where('id',$user->getSubcription->plan_id)->with('getRelationalData.getModule','getRelationalData.getOperation')
                    ->first();
                    $module = MasterPlanModule::all();
                    $action = MasterPlanOperation::all();

                    $request->session()->put('permission',$plans->getRelationalData);
                    $request->session()->put('module',$module);
                    $request->session()->put('action',$action);
                    // $request->session()->put('freeToastmsg',false);
                    $subscription=UserSubscription::query()->where('user_id',auth()->user()->id)->first();
                   
                    $request->session()->put('user_subscription_end_date',$subscription->subscription_end_date??"");
                    if(!empty($subscription) && $subscription->platform_subscription_id=='free' ){
                        $request->Session()->put('freeSubscription', "free");
                    }

                    

                    $this->expirePlan();
                }  
            }
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        // $request->session()->forget('freeToastmsg');

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('login');
     
    }

    protected function expirePlan(){
        $users=UserSubscription::query()->where('status','active')->get();
        foreach ($users as $key => $user) {
            if($user->subscription_end_date< Carbon::now() )
            $user->status="inactive";
            $user->save();
        }
    }

    public function expirePlanForGoogle()
    {
       $this->expirePlan();
    }

        /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|exists:users,email',
            'password' => 'required|string',
        
        ],[$this->username().'.exists'=>"Email does not exist."]);
    }
}