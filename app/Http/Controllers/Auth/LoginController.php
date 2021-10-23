<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/libros';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function api_login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'deviceToken'    => 'required|string'
        ]);
        
        if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            return response()->json([
                'message_type' => 'error',
                'message_text' => 'La combinación de correo y contraseña es incorrecta',
            ], 401);
        }

        $user = Auth::user();
        $token =  $user->createToken('Acceso desde el api');

        return response()->json([
            'user' => $user,
            'token_info' => $token
        ]);
    }
}
