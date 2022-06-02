<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
//	 // -------------------- [ user registration view ] -------------
//    public function index() {
//        return view('auth.register');
//    }
//
//// --------------------- [ Register user ] ----------------------
//    public function userPostRegistration(Request $request) {
//
//        // validate form fields
//        $request->validate([
//                'first_name'        =>      'required',
//                'last_name'         =>      'required',
//                'email'             =>      'required|email',
//                'password'          =>      'required|min:6',
//                'confirm_password'  =>      'required|same:password',
//                // 'phone'             =>      'required|max:12'
//            ]);
//
//        $input          =           $request->all();
//
//        // if validation success then create an input array
//        $inputArray      =           array(
//            'first_name'        =>      $request->first_name,
//            'last_name'         =>      $request->last_name,
//            'full_name'         =>      $request->first_name . " ". $request->last_name,
//            'email'             =>      $request->email,
//            'password'          =>      Hash::make($request->password),
//            // 'phone'             =>      $request->phone
//        );
//
//        // register user
//        $user           =           User::create($inputArray);
//
//        // if registration success then return with success message
//        if(!is_null($user)) {
//            return redirect('/')->with('success', 'You have registered successfully.');
//        }
//
//        // else return with error message
//        else {
//            return back()->with('error', 'Whoops! some error encountered. Please try again.');
//        }
//    }
//
//
//
//// -------------------- [ User login view ] -----------------------
//    public function userLoginIndex() {
//        return view('login');
//    }
//
//
//// --------------------- [ User login ] ---------------------
//    public function userPostLogin(Request $request) {
//
//        $request->validate([
//            "email"           =>    "required|email",
//            "password"        =>    "required|min:6"
//        ]);
//
//        $userCredentials = $request->only('email', 'password');
//
//        // check user using auth function
//        if (Auth::attempt($userCredentials)) {
//            return redirect()->intended('dashboard');
//        }
//
//        else {
//            return back()->with('error', 'Whoops! invalid username or password.');
//        }
//    }
//
//
//// ------------------ [ User Dashboard Section ] ---------------------
//    public function dashboard() {
//
 //        // check if user logged in
//        if(Auth::check()) {
//            return view('dashboard');
//        }
//
//        return redirect::to("user-login")->withError('Oopps! You do not have access');
//    }
//
//
//// ------------------- [ User logout function ] ----------------------
//    public function logout(Request $request ) {
//    $request->session()->flush();
//    Auth::logout();
//    return Redirect('user-login');
//    }

    //-------------------------------------------------------------
    // public function settings($id){

    //     $user=User::all()->find($id);
    //     return view('auth.userProfile',compact('user'));

    // }
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function profile($id)
     {
         $user = User::all()->find($id);
         if ( auth()->user()->id == $id) {
             return view('auth.userProfile', compact('user'));
         } else {

             return redirect()->to('/');
         }

     }

      public function update(Request $request,$id)
      {
          $request->validate([
              'myimage' => 'image|mimes:jpeg,png,jpg|max:2048',
              'name' => 'required|min:2|max:11',
              'email' => 'required|email'
          ]);

          $auth_id = Auth::id();
          $user = User::all()->find($id);


//          foreach ($users as $mona) {
          if ($id == $auth_id) {

              if ($request->hasFile('myimage')) {
//
//                      if ($request->file('myimage')->isValid()) {

                  $image_name = date('mdYHis') . uniqid() . $request->file('myimage')->getClientOriginalName();
                  $path = base_path() . '/public/img/avatar';
                  $request->file('myimage')->move($path, $image_name);
                  $user->avatar = $image_name;
              } else {

                  $user->avatar = $user->avatar;

              }
              $user->name = Request('name');
//
//                          ddd($request);
              $user->email = Request('email');
              // $user->avatar=Request('avatar');
//                          DB::table('users')
//                              ->update($user);

              $user->update();


              // $user->update(all());
              $request->session()->flash('status', 'your data updated successfully!');
              return redirect()->back();
          }
//                      return response('not valied');
//                  }
//                  return response('no image');
//              }

          return redirect('/');

      }
//
}


