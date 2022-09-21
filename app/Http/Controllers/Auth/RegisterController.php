<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Notifications\InvoicePaid;
use App\Notifications\VerifyOtp;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
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
            'name'=>$data['first_name']." ".$data['last_name'],
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
        $otp = $this->createOtp($user);
        $collect  = collect();
        $collect->put('otp',$otp);
        $user->notify(new VerifyOtp($collect));
        

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        
        // return $this->verifyOtpView($user->id);
        return redirect()->route('otp-view', ['email' => $user->email]);

    }

    //  API register
    public function apiRegister(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $collect  = collect();
        $collect->put('otp','123456');
        $user->notify(new VerifyOtp($collect));
        

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        
        return [$user];
        
    }

    public function createOtp($user)
    {
        $otp = new Otp();
        $otp->user_id = $user->id;
        $otp->otp = rand(100000,999999);
        $otp->save();
        return $otp->otp;
    }


     // view OTP
     public function verifyOtp(Request $request)
     {  
         try {
             // validate request data.
             $validator = Validator::make($request->all(), [
                 'email' => 'required|email|exists:users,email',
                 'otp' => 'required|numeric',
             ], [
                 'otp.required' => 'OTP is Required',
                 'otp.numeric' => 'OTP is invalid.',
                 'email.required' => 'Something went wrong. Try again.',
                 'email.email' => 'Something went wrong. Try again.',
                 'email.exists' => 'Something went wrong. Try again.'
             ]);
             if ($validator->fails()) {
                  return redirect()->route('verify_otp');
                
                return back()->with('error','You are not logged in or Your session has expired');
             } else {
                 $userObj = User::query()
                     ->where("email", $request->email)
                     ->first();
                 if (!empty($userObj)) {
                     $otpObj = Otp::query()
                         ->where("user_id", $userObj->id)
                         ->where("otp", $request->otp)
                         ->first();
                     if (empty($otpObj)) {
                        return back()->with('error','You are not logged in or Your session has expired');
                     }

                        $userObj->email_verified_at = Carbon::now();
                        $userObj->save();
                        $this->guard()->login($userObj);
                
                        return $request->wantsJson()
                                    ? new JsonResponse([], 201)
                                    : redirect($this->redirectPath());                    
                      
                 }else{
                     // return $this->returnResponse(false, "ERR032", config('error_codes.verify_otp.ERR032'), null, null);
                 }
             }
         } catch (Exception $e) {
            return back()->withError('You are not logged in or Your session has expired');
         }
       
     }

     public function verifyOtpView(Request $request){
        $user = User::query()->where('email',$request->email)->first();
        return view('auth.otp',compact('user'));
     }

}
