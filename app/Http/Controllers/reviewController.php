<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;

class reviewController extends Controller
{
	   public function __construct()
    {
        $this->middleware('auth');
    }
	  public function index()
    {
        return view('review-us');
    }

      public function store(Request $request) {

        $request->validate( [
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
       $auth_id=Auth::id();

        $review = new Review();

        $review->name = Request('name');
        $review->user_id = $auth_id;
        $review->subject =Request ('subject');
        $review->message =Request ('message');
        $review->save();

         $request->session()->flash('status', 'your review was successful!');
        return redirect()->back();

    }

    //
}
