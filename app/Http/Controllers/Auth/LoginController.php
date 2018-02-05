<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request $request ){

        //dd( 'yes sir' );

        if (Auth::guard()->attempt(['email'=> $request->email, 'password'=> $request->password],$request->remember)) {
            
            //dd(  Auth::user()->id );
            //if succesful redirect user to their intendedn location
            $id =  Auth::user()->id;

            $role = DB::table('role_users')->select('role_id')->where('user_id', $id )->get();

            //dd($role[0]->role_id);

            if( $role[0]->role_id == 2 ){

                //dd(' user ');

                return redirect('/home');

            }else{

                //dd(' admin ');
                return redirect('/admin');
            }


            //return redirect()->intended(route('admin.dashboard'));  
        }       
        
        //if unsuccesful then redirect back to login with the data
        return redirect()->back()->withInput($request->only('email','remember'));


    }


}
