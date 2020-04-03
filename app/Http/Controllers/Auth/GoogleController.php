<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\GoogleService;
use Auth;

class GoogleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Google Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users from google for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(GoogleService $authService)
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return $this->authService->redirectToProvider();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $this->authService->loginOrRegister();
        return redirect($this->redirectTo);
    }
}
