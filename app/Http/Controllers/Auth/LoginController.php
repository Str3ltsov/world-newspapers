<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\LinkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';
		private LinkService $linkService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LinkService $linkService)
    {
				$this->linkService = $linkService;
        // $this->middleware('guest')->except('logout');
    }
		/**
     * Show the application's login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
		public function showLoginForm()
    {
				$this->middleware('guest');
				$linkBreadcrumb = [
					['path' => '/', 'title' => 'Home'],
					['path' => '/login', 'title' => 'Login']
				];
        return view('auth.login', compact('linkBreadcrumb'));
    }
		public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($this->isAdmin()) {
                return redirect('/admin/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
		public function logout(Request $request){
    		Auth::logout();
    		$request->session()->invalidate();
    		$request->session()->regenerateToken();

    		return redirect('/');
		}

		protected function isAdmin(): bool
    {
        $user = Auth::user();
        return $user && $user->role_id === 1;
    }
}
