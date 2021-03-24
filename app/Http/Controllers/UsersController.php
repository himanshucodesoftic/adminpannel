<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UsersController extends Controller
{
    public function index() {
        return view('registration');
    }

// --------------------- [ Register user ] ----------------------
public function userPostRegistration(Request $request) {

    // validate form fields
    $request->validate([
            'first_name'        =>      'required',
            'last_name'         =>      'required',
            'email'             =>      'required|email',
            'password'          =>      'required|min:6',
            'confirm_password'  =>      'required|same:password',
            'phone'             =>      'required|max:10'
        ]);

    $input          =           $request->all();

    // if validation success then create an input array
    $inputArray      =           array(   
        'first_name'        =>      $request->first_name,
        'last_name'         =>      $request->last_name,
        // 'full_name'         =>      $request->first_name . " ". $request->last_name,
        'email'             =>      $request->email,
        'gender'=>$request->gender,
        'profile_pic'=>$request->profile_pic,
        'password'          =>      Hash::make($request->password),
        'phone'             =>      $request->phone,
        'address'=>$request->address,
        'city'=>$request->city,
        'state'=>$request->state,
        'pincode'=>$request->pincode,
        'countryCode'=>$request->countryCode
       

    );

    // register user
    $user           =           User::create($inputArray);

    // if registration success then return with success message
    if(!is_null($user)) {
        return back()->with('success', 'You have registered successfully.');
    }

    // else return with error message
    else {
        return back()->with('error', 'Whoops! some error encountered. Please try again.');
    }
}
// -------------------- [ User login view ] -----------------------
    public function userLoginIndex() {
        return view('login');
    }


// --------------------- [ User login ] ---------------------
    public function userPostLogin(Request $request) {

        $request->validate([
            "email"           =>    "required|email",
            "password"        =>    "required|min:6"
        ]);

        $userCredentials = $request->only('email', 'password');

        // check user using auth function
        if (Auth::attempt($userCredentials)) {
            return redirect()->intended('dashboard');
        }

        else {
            return back()->with('error', 'Whoops! invalid username or password.');
        }
    }


// ------------------ [ User Dashboard Section ] ---------------------
    public function dashboard() {

        // check if user logged in
        if(Auth::check()) {
            return view('dashboard');
        }

        return redirect::to("userlogin")->withSuccess('Oopps! You do not have access');
    }


// ------------------- [ User logout function ] ----------------------
public function logout(Request $request ) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('userlogin');
    }
    
}
