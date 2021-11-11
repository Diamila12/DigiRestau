<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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
        $this->middleware('guest')->except('logout');
    }

    // verification des donnees apres connexion
    public function addLogin(Request $request)
    {
        $input = $request->all();

        $this->validate($request,[
            'email' =>'required|email',
            'password' => 'required',
        ]);

        $email = User::where('email',$input['email'])->count();

        if($email > 0)
        {
            // if(auth()->attempt(array('approved' => 1,'is_admin' => 1,'statut' => "admin", 'email' => $input['email'], 'password' => $input['password'])))
            // {
            //     return redirect('/admin');
            // }else{
            //      return redirect('login');
            // }

            if(auth()->attempt(array('is_actived' => 1,'statut' => "client", 'email' => $input['email'], 'password' => $input['password'])))
            {
                return redirect('/home/client');

            }elseif(auth()->attempt(array('statut' => "restaurant", 'approved' => 1, 'email' => $input['email'], 'password' => $input['password']))){
                return 'ok';
            }else{
                return redirect('login')->with(session()->flash('alert-danger', "Votre email sera validé sous peu de temps"));
            }
        }else
        {
            redirect('login');
        }
    }


}
