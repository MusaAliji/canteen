<?php

namespace App\Http\Controllers;

use App\Canteen;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class CanteenController extends Controller
{

    public function owner(){
        Auth::user()->authorizeRoles('canteener');

        $canteens = Auth::user()->canteen;
        return view('canteens.owner',compact('canteens'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->authorizeRoles(['admin','user']);
        $canteens = Canteen::latest()->paginate(10);

        $auth_user = Auth::user()->hasRole('user');
        return view('canteens.home',compact('canteens','auth_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles(['canteener','admin']);
        $canteener = Auth::user()->hasRole('canteener');
        return view('canteens.create',compact('canteener'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->authorizeRoles(['canteener','admin']);
        $request->validate([
           'name' => 'required|max:50',
            'location' => 'required|max:100',
            'open' => 'required',
            'close' => 'required'
        ]);

        if (Auth::user()->authorizeRoles('canteener')){
            $user = \auth()->id();
        }
        else{
            $user = $request['user_id'];
        }

        Canteen::create([
           'name' => $request['name'],
            'user_id' => $user,
            'location' => $request['location'],
            'open' => $request['open'],
            'close' => $request['close'],
        ]);


        if (Auth::user()->authorizeRoles('canteener')){
            return redirect('/canteen');
        }

        return redirect('/canteens');
    }

    public function createProduct(Canteen $canteen){

        return view('canteens.createProduct', compact('canteen'));
    }

    public function storeProduct(Request $request){


        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
        ]);

       $image = file_get_contents($request['image']);

        $product = Product::create([
            'name'=> $request['name'],
            'kinds_id'=>$request['kind'],
            'price'=> $request['price'],
            'image' => $image
        ]);

        $product->canteen()->attach([$request['canteen']]);

        return redirect('/canteens/'.$request['canteen']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function show(Canteen $canteen)
    {
        Auth::user()->authorizeRoles(['canteener','user']);
        $auth_user = Auth::user()->hasRole('user');

        $products = $canteen->products;

//        return $products;

        return view('canteens.show',compact('products','auth_user','canteen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function edit(Canteen $canteen)
    {
        Auth::user()->authorizeRoles(['canteener','admin']);
        $canteener = Auth::user()->authorizeRoles('canteener');
        return view('canteens.edit',compact('canteen','canteener'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canteen $canteen)
    {
        Auth::user()->authorizeRoles(['canteener','admin']);

        if (Auth::user()->authorizeRoles('canteener')){
            $user = \auth()->id();
        }
        else{
            $user = $request['user_id'];
        }
            $canteen->update([
                'name' => $request['name'],
                'user_id' => $user,
                'location' => $request['location'],
                'open' => $request['open'],
                'close' => $request['close']
            ]);

            if (Auth::user()->authorizeRoles('canteener')){
                return redirect('/canteen');
            }

        return redirect('/canteens');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Canteen  $canteen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canteen $canteen)
    {
        Auth::user()->authorizeRoles(['canteener','admin']);
        $canteen->delete();

        if (Auth::user()->authorizeRoles('canteener')){
            return redirect('/canteen');
        }

        return redirect('/canteens');
    }
}
