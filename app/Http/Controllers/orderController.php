<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use App\Order_Item;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{

    public function __construct()
   {
       $this->middleware('auth');
//       $this->middleware('isCashier');
   }
	public function order(Request $request){
		$dishes = Dish::all();
//		$order_item=Order_Item::all();
//		$order=Order::all();
		return view('orderNow', compact('dishes'));
	}


	public function makeOrder( Request $request)
    {

        $request->validate( [
            'first_name' => 'required|max:11|min:2',
            'last_name' => 'required|max:11|min:2',
            'phone' => 'required|digits:11',
            'city' => 'required',
            'street' => 'required',
            'postal_code'=> 'required|numeric|digits:5',
            'meal0'=> 'required'
        ]);
        // dd($request);
        // $price = DB::table('dishes')
        //               ->where('id', Request('meal'))
        //               ->sum('dish_price');
//   //               dd($price);
//        $orders=Order::all();
        $order = new Order();
//		$order_item=new Order_Item();
        $userId = Auth::id();


        $order->first_name = Request('first_name');
        $order->last_name = Request('last_name');
        $order->phone = Request('phone');
        $order->city = Request('city');
        $order->street = Request('street');
        $order->postal_code = Request('postal_code');
        $order->user_id = $userId;
        $order->save();
        $last = Order::orderBy('id', 'desc')->first();
        $last = $last->id;
//order_item table
        $counter = 0;
        while (Request('meal' . $counter )) {
            $order_item = new Order_Item();
            $currentMeal = Request('meal' . $counter);
            $quantity = Request('quantity'.$counter);
//            if($counter==1){
//            // dd($quantity);
//        }
            $dishPrice = Dish::where('id', $currentMeal)->first()->dish_price;
            $totalPrice = $dishPrice * $quantity;

            $order_item->dish_id = $currentMeal;
            $order_item->quantity = $quantity;
            $order_item->total_price = $dishPrice * $quantity;
            $order_item->order_id = $last;
//            ddd($totalPrice);
            $order_item->save();

            $counter++;
        }
            $price = DB::table('order_item')
                ->where('order_id', $last)
                ->sum('total_price');

            $order->net_price = $price;
//        $request->session()->push(['net_price' => '$price',]);
            $order->save();

        $request->session()->flash('status', 'order was successful!');
            return redirect('/order-confirm');
        }


    public  function fetch(Request $request )
    {

        $query= Request('value');
        $op = DB::table('dishes')
            ->where('dishes.id','=', $query)
            ->pluck('dishes.dish_price');
        $op=$op[0];
//         $op=Dish::get('dish_price')->where('id',$request->value)->first();
//        return response($op)->json();
        return response()->json($op);

    }
    public  function priceTwo(Request $request )
    {
        $query= $request->get('selectID');
        $op = DB::table('dishes')
            ->where('id','=', $query)
            ->pluck('dish_price');
        $op=$op[0];
        return response()->json($op);
    }

    public function totalPriceUpdate(Request $request){
        $query1= $request->get('quantity');
        $query2= $request->get('dishID');

        $op = DB::table('dishes')
            ->where('id','=', $query2)
            ->pluck('dish_price');
        $op=$op[0];
        $price=$query1*$op;
        return response()->json($price);
    }
  public function confirm(Request $request ){
    $auth_id=Auth::id();
$user_id=DB::table('orders')->pluck('user_id');
foreach($user_id as $userID) {
    if ($auth_id == $userID) {
        $order = DB::table('orders')
            ->Where('user_id', '=', $auth_id)
            ->select('orders.*')
            ->orderBy('id', 'desc')
            ->first();
//   $request->session()->put($order);
        // $order=Order::all()->find($id);

    }
}
//      $request->session()->get($order);
//      $request->session()->flush();

      return view('orders.orderConfirmation',compact('order'));

  }
    public function cancel(Request $request,$id){
        $order=Order::all()->find($id);

////        $order_item  = Order_Item::all()
////            ->Where('order_id','=', $order)
////            ->get()->all();
        $order->delete();
             $order_item= DB::table('order_item')->where('order_id', '=', $order)->select();
        $order_item->delete();
//        DB::table('order_item')->where('order_id', '=', $order)->delete();


//        session()->forget(['order','order_item']);
        return redirect('/order');
    }
}
