<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Query;
use App\Models\User;
use App\Models\UserJob;
use App\Models\UserProject;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends AdminController
{

    use AuthenticatesUsers;

    protected $redirectTo = 'admin/dashboard/index';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $users=User::query()->where('user_type','U')->where('status','1')->orderBy('created_at', 'desc')->limit('5')->get();
            // dd(count($users));
            $totalUsers=User::query()->where('user_type','U')->get();
            $totalUsreCount=(count($totalUsers));
            $totalProject=UserProject::query()->where('user_status','!=','draft')->get();
            $totalProjectCount=count($totalProject);
            $totalJob=UserJob::all();
            $totalJobCount=count($totalJob);
            $totalQuery=Query::all();
            $totalQueryCount=count($totalQuery);
           
            
            return view('admin.dashboard',compact('totalUsreCount','totalProjectCount','totalJobCount','totalQueryCount','users'));
        }
        catch (Exception $e)
        {
            Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
            return back();
        }
        // catch (\Throwable $e) {
        //     return back()->withErrors($e->getMessage());
        // }
    }

     /**
 * Show the application's login form.
 *
 * @return \Illuminate\View\View
 */
public function showLoginAdmin()
{
    return view('admin.auth.login');
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
    try {
    $this->validateLogin($request);
    // If the class is using the ThrottlesLogins trait, we can automatically throttle
    // the login attempts for this application. We'll key this by the username and
    // the IP address of the client making these requests into this application.
    if (method_exists($this, 'hasTooManyLoginAttempts') &&
        $this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

        return $this->sendLockoutResponse($request);
    }

    if ($this->attemptLogin($request)) {
        if ($request->hasSession()) {
            $request->session()->put('auth.password_confirmed_at', time());
        }

        return $this->sendLoginResponse($request);
    }

    // If the login attempt was unsuccessful we will increment the number of attempts
    // to login and redirect the user back to the login form. Of course, when this
    // user surpasses their maximum number of attempts they will get locked out.
    $this->incrementLoginAttempts($request);

    return $this->sendFailedLoginResponse($request);
} 
catch (Exception $e)
{   
    Session::flash('response', ['text'=>'Login credentials are incorrect. Please try again.!','type'=>'danger']);
    return back();
}
// catch (\Throwable $th) {
//     //throw $th;
// }

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
    try {
        $request->validate([
            $this->username() => 'required|email',
            'password' => 'required|string',
        ]);
    }     
    catch (Exception $e)
    {
        Session::flash('response', ['text'=>$this->getError($e),'type'=>'danger']);
        return back();
    }
    
}

/**
 * Attempt to log the user into the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return bool
 */
protected function attemptLogin(Request $request)
{
    $request->user_type = "A";
    return $this->guard()->attempt(
        $this->credentials($request), $request->boolean('remember')
    );
}

/**
 * Get the needed authorization credentials from the request.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return array
 */
protected function credentials(Request $request)
{
    return $request->only($this->username(), 'password');
}

/**
 * Send the response after the user was authenticated.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
 */
protected function sendLoginResponse(Request $request)
{
    $request->session()->regenerate();

    $this->clearLoginAttempts($request);

    if ($response = $this->authenticated($request, $this->guard()->user())) {
        return $response;
    }

    return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect()->intended($this->redirectPath());
}

/**
 * The user has been authenticated.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  mixed  $user
 * @return mixed
 */
protected function authenticated(Request $request, $user)
{
    //
}

/**
 * Get the failed login response instance.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Symfony\Component\HttpFoundation\Response
 *
 * @throws \Illuminate\Validation\ValidationException
 */
protected function sendFailedLoginResponse(Request $request)
{
    throw ValidationException::withMessages([
        $this->username() => [trans('auth.failed')],
    ]);
}

/**
 * Get the login username to be used by the controller.
 *
 * @return string
 */
public function username()
{
    return 'email';
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
    //session_unset();

    if ($response = $this->loggedOut($request)) {
        return $response;
    }

    return redirect()->route('admin.loginview');
}

/**
 * The user has logged out of the application.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return mixed
 */
protected function loggedOut(Request $request)
{
    //
}

/**
 * Get the guard to be used during authentication.
 *
 * @return \Illuminate\Contracts\Auth\StatefulGuard
 */
protected function guard()
{
    return Auth::guard();
}
}
