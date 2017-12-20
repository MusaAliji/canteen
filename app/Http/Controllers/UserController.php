<?php

namespace App\Http\Controllers;

use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function owner(){
        Auth::user()->authorizeRoles('user');
        $user = Auth::user();

        return view('users.profile',compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->authorizeRoles('admin');
        $users = User::all();

        return view('users.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Auth::user()->authorizeRoles('admin');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Auth::user()->authorizeRoles('admin');
        $request->validate([
            'name' => 'required|string',
            'surname' =>'required|string',
            'room' => 'numeric|min:100|max:999',
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed'
        ]);

       $user = User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'degree_id' => $request['degree'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
        ]);

       $user->room()->create([
          'number' => $request['room'],
           'department_id' => $request['department']
       ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        Auth::user()->authorizeRoles(['admin','user']);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param User $user
     * @param Room $room
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, User $user)
    {
        Auth::user()->authorizeRoles(['admin','user']);
        $user->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'degree_id' => $request['degree'],
            'email' => $request['email'],
            'phone' => $request['phone']
        ]);

        if (Auth::user()->hasRole('user')){
            $user_id = \auth()->id();
        }
        else{
            $user_id = $user;
        }

        if(Room::where('user_id',$user->id)->first() == null){
            Room::create([
                'user_id' => $user_id,
                'number' => $request['number'],
                'department_id' => $request['department']
            ]);
        }
        else{
            $user->room()->update([
                'number'=> $request['room'],
                'department_id' => $request['department']
            ]);
        }

        if (Auth::user()->hasRole('user')){
            return redirect('/profile');
        }

        return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(User $user)
    {
        Auth::user()->authorizeRoles('admin');
        $user->room()->delete();
        $user->delete();


        return redirect('/users');
    }
}
