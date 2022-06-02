<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dishController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('create','edit','index');
        $this->middleware('isAdmin')->only('create','edit','index');
    }
	//(function) to display menu page
	public function show(){
		$dishes=request()->file('img');
//		$dishes=Dish::all();
        $specials = DB::table('dishes')
            ->where('dish_special', 'special')->get();
        $breakfast = DB::table('dishes')
            ->where('dish_type', 'breakfast')->get();
        $lunch = DB::table('dishes')
            ->where('dish_type', 'lunch')->get();
        $dinner = DB::table('dishes')
            ->where('dish_type', 'dinner')->get();
		return view('menu',compact('breakfast','lunch','dinner','specials'));
	}


//===================================================================
    //1-(function)to export the category to createMenu page
//	public function prepare(){
//        $categories=Category::all();
//        return view('menu.createMenu',compact('categories'));
//    }
//===================================================================
    //2-(function) to show the createMenu page
    public function create(){
        $categories=Category::all();
        return view('menu.createMenu',compact('categories'));

    }
//====================================================================
    //3-(function) to upload the menu items to database
	 public function store(Request $request){
	 	if($request->hasFile('myimage')){
	    if ($request->file('myimage')->isValid()) {
			$dish=new Dish();
            $image_name = date('mdYHis') . uniqid() . $request->file('myimage')->getClientOriginalName();
            $path = base_path() . '/public/img';
            $request->file('myimage')->move($path,$image_name);
            $dish->dish_image = $image_name;
            $dish->dish_name=Request('dish_name');
            $dish->dish_type=Request('dish_type');
            $dish->dish_price=Request('dish_price');
            $dish->category_id=Request('category_id');
            $dish->dish_description=Request('dish_description');
            $dish->dish_special=Request('dish_special');

            $dish->save();
            return redirect()->back();
        }
        return redirect()->back()->with('error', 'image not valid');
    }
    return redirect()->back()->with('error', 'no image');
}

public function action(Request $request){

	    if($request->ajax()){

	        $query= $request->get('query');
	        if($query !='')
            {
                $data=DB::table('dishes')
                    ->where('dish_name','like','%'.$query.'$')
                    ->orWhere('dish_description','like','%'.$query.'$')
                    ->orderBy('id','desc')
                    ->get();
            }
	        else
	        {
                $data=DB::table('dishes')
                    ->orderBy('id','desc')
                    ->get();
            }
	        $total_row=$data->count();
	        if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output = '<h2>.$row->dish_name. </h2>';
                }
            }
	        else
            {
                $output='<h1> no data</h1>';
            }
	        $data=array(
	            'table_data'  =>$output,
//                'total_data'  =>$total_data

            );
	        echo json_encode($data);
        }
}
 //===============================================================

//===============================================================

    public function edit($id){
        $dish=Dish::all()->find($id);
        return view('menu.editMenu',compact('dish'));
    }

    public function update(Request $request,$id){
        // $this->menuvalidate($request);
        if($request->hasFile('myimage')){
            if ($request->file('myimage')->isValid()) {
                $dish=Dish::all()->find($id);
                $image_name = date('mdYHis') . uniqid() . $request->file('myimage')->getClientOriginalName();
                $path = base_path() . '/public/img';
                $request->file('myimage')->move($path,$image_name);
                $dish->dish_image = $image_name;
                $dish->dish_name=Request('dish_name');
                $dish->dish_type=Request('dish_type');
                $dish->dish_price=Request('dish_price');
                $dish->category_id=Request('category_id');
                $dish->dish_description=Request('dish_description');
                $dish->dish_special=Request('dish_special');

                $dish->save();
                return redirect('/dishes');
            }
            return redirect()->back()->with('error', 'image not valid');
        }
        return redirect()->back()->with('error', 'no image');

    }

    public function delete($id){
        $dish=Dish::all()->find($id);
        $dish->delete();
        return redirect('/dishes');

    }

    public function index() {
        $dishes=Dish::all();
        return view('menu.dishes',compact('dishes'));
    }

}
