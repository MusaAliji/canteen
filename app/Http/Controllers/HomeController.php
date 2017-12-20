<?php

namespace App\Http\Controllers;

use App\Canteen;
use App\Notifications\OrderNotify;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return Request
     */
    public function store(Request $request){

//        Order::create([
//            'user_id'=> Auth::id(),
//            'product_id'=>$request['product']
//        ]);
        $canteen = Canteen::find($request['canteens']);
        $product = Product::find($request['product']);
        $canteen->user->notify(new OrderNotify($product));

        return back();
    }

    public function notification(Request $request){
        return $request;
    }
}
