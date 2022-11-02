<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\OtpUtilityController;
use App\Models\Otp;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Str;   
use App\Notifications\VerifyOtp;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('website.auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . " " . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $otp_type = 'S'; // S for signup
        $otp = OtpUtilityController::createOtp($user, $otp_type);
        $collect  = collect();
        $collect->put('otp', $otp);
        $user->notify(new VerifyOtp($collect));

        if ($response = $this->registered($request, $user)) {
            return $response;
        }



        // return $this->verifyOtpView($user->id);
        return redirect()->route('otp-view', ['email' => $user->email, 'type' => $otp_type])->with('success', 'OTP send successfully to your email.');
    }

    //  API register
    public function apiRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $collect  = collect();
        $collect->put('otp', '123456');
        $user->notify(new VerifyOtp($collect));


        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return [$user];
    }




    // view OTP
    public function otpVerify(Request $request)
    {
        try {
            // validate request data.
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'type' => 'required',
            ], [
                'email.required' => 'Something went wrong. Try again.',
                'email.email' => 'Something went wrong. Try again.',
                'email.exists' => 'Something went wrong. Try again.',
                'type.required' => 'Something went wrong. Try again. '
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors()->messages())->withInput();
            } else {
                $userObj = User::query()
                    ->where("email", $request->email)
                    ->first();
                $otpObj = Otp::query()
                    ->where("user_id", $userObj->id)
                    ->where("otp", $request->otp)
                    ->where("type", $request->type)
                    ->latest()
                    ->first();

                if (!$otpObj) {
                    return back()->with('error', 'Invalid OTP.');
                }
                if($request->type == 'F'){
                    
                 $token = $otpObj->token;
                 $email = $request->email;
                 return redirect()->route('password.reset',['token' => $token,'email'=>$email])->with('success', 'OTP verified successfully.');
                
                }elseif($request->type == 'S')
                {
                    $userObj->email_verified_at = Carbon::now();
                    $userObj->save();
                    $this->guard()->login($userObj);
                    return redirect('home');

                }
                else{
                    return back()->with( 'error','Something went wrong.');
                }
              
              
            }
        } catch (Exception $e) {
            return back()->with( 'error','Something went wrong.');
        }
    }

    public function index(Request $request)
    {   
        $type= $request->type;
        $user = User::query()->where('email', $request->email)->first();
        return view('website.auth.otp', compact('user','type'));
    }


    public function resendOtp($email = null,$type = null)
    {  if($email == null){
        return back()->with('error', 'Email field is required.')->withInput();
       }
        $user =  User::query()->where('email', $email)->first();
        if ($user) {
            
                $otp = OtpUtilityController::createOtp($user, $type);
                $collect  = collect();
                $collect->put('otp', $otp);
                $user->notify(new VerifyOtp($collect));
                return back()->with('success', 'OTP Re-Send successfully.');
          
        } else {
            return back()->with('error', 'Email does not exist. Please try again.')->withInput();
        }
    }
}
