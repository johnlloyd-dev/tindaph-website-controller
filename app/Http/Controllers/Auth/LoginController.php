<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Auth as FireAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\User;
class LoginController extends Controller {
use AuthenticatesUsers;
protected $auth;
protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct(FireAuth $auth) {
        $this->middleware('guest')->except('logout');
        $this->auth = $auth;
    }

    protected function login(Request $request) {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
            $user = new User($signInResult->data());
            $result = Auth::login($user);
            return redirect($this->redirectPath());
        } catch (FirebaseException $e) {
            throw ValidationException::withMessages([$this->username() => [trans('auth.failed')],]);
        }
    }
    public function username() {
        return 'email';
    }
}
