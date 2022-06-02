<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * //  * @return void
     * //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
    public function index()
    {
        return redirect('/');
    }
    public function search(Request $request){
    $category = $request->input('category');

    //now get all user and services in one go without looping using eager loading
    //In your foreach() loop, if you have 1000 users you will make 1000 queries

    $dishes = Dish::with( 'category',function($query) use ($category) {
         $query->where('dish_name', 'LIKE', '%' . $category . '%');
    })->get();

    return view('index', compact('users'));
}


    public function special()
    {
//      $userId=Auth::id();
      $dishes= DB::table('dishes')
           ->where('dish_special', 'special')->get();

//     $avatar=User::find('id');
        $users = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('users.avatar', 'reviews.*')
            ->get();

//      $avatars=User::all();
//          $reviews=Review::all();
//         $avatar= DB::table('users')->join('reviews','users.id','=','reviews.user_id')
//             ->get('avatar');
      return view('index', compact('dishes','users'));
    }

}
