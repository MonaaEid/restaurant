<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddReservationRequest;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class reservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin')->only('index', 'show', 'edit');

//        $this->middleware('isAdmin', ['except' => ['index', 'show', 'edit']]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //(function) to display reservation page
     public function reserv()
    {

         return view('reservations');
    }

     //(function) to add a reservation to the database
    public function store(AddReservationRequest $request){
        // $session_id = session()->getId();
       $userId = Auth::id();
         // $user=User::all();
        $reservation= new Reservation();
        $reservation->first_name=Request('first_name');
        $reservation->last_name=Request('second_name');
        $phone='2'.Request('client_phone');
//        dd($phone);
        $reservation->client_phone=$phone;
        $reservation->guests_number=Request('guests_number');
        $reservation->comment=Request('comment');
        $reservation->booking_date=Request('date');
        $reservation->user_id=$userId;

//        $basic  = new \Nexmo\Client\Credentials\Basic('162991c1', 'UVoC2PMfrbWwW0EB');
//        $client = new \Nexmo\Client($basic);
//
//        $message = $client->message()->send([
//            'to' => $phone,
//            'from' => 'DEJA RESTAURANT',
//            'text' => 'Reservation was successful!'
//        ]);

        $reservation->save();
        $request->session()->flash('status', 'Reservation was successful!');
        return redirect()->back();
    //
    }

    //(function) to display the list of reservations
	public function index(){
        $reservations=Reservation::all();
        return view('reservations.showReservations',compact('reservations'));
    }

    //(function) to display one item of reservations
    public function show($id){
        $reservation=Reservation::all()->find($id);
        $user=User::all();
        $url= URL::current();
        return view('reservations.item',compact('reservation','user','url'));
    }
    //(function) to delete an item of reservation
    public function delete($id){
        $reservation=Reservation::all()->find($id);
        $reservation->delete();
        return redirect('/list');
    }
//=================================================================
    //(function) to bring an item of reservation by id and edit it
     public function edit($id){
        $reservation=Reservation::all()->find($id);
        return view('reservations.editReservation',compact('reservation'));
    }
    //(function) to update the editing and store it to database
     public function update(AddReservationRequest $request,$id){
        $reservation=Reservation::all()->find($id);
        $reservation->first_name=Request('first_name');
        $reservation->last_name=Request('second_name');
        $reservation->client_phone=Request('client_phone');
        $reservation->guests_number=Request('guests_number');
        $reservation->comment=Request('comment');
        $reservation->booking_date=Request('date',null);




        $reservation->save();
        return redirect('/list');

    }


}
